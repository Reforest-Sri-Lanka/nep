<?php

namespace CrimeReport\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
Use App\Notifications\ApplicationMade;
use Illuminate\Http\Request;
use App\Models\Land_Parcel;
use App\Models\Crime_report;
use App\Models\Crime_type;
use App\Models\User;
use App\Models\Process_item;
use App\Models\Organization;
use App\Models\tree_removal_request;


class CrimeReportController extends Controller
{

    
    public function create_crime_report(Request $request)
    {  
        $request -> validate([
            'crime_type' => 'required|not_in:0',
            'description' => 'required',
            'landTitle' => 'required',
            'confirm' => 'required',
            'create_by'=>'required',
            'organization' => 'required|not_in:0',
            'polygon' => 'required',
        ]);
        if($request->has('nonreguser')){
            $request -> validate([
                'Requestor_email' => 'required',
                'Requestor' => 'required',
            ]);
        }
        $array=DB::transaction(function () use($request) {
            
            $land = new Land_Parcel();
            $land->title = $request['landTitle'];
            $land->governing_organizations =$request['organization'];
            $land->polygon = request('polygon');
            $land->created_by_user_id = $request['create_by'];
            if (request('isProtected')) {
                $land->protected_area = request('isProtected');
            }
            $land->save();
            $landid = Land_Parcel::latest()->first()->id;

            $Crime_report = new Crime_report;
            $Crime_report->Created_by_user_id = $request['create_by'];
            $Crime_report->crime_type_id = $request['crime_type'];
            $Crime_report->description = $request['description'];
            $Crime_report->photos = "{}";
   
                $Crime_report->logs = "{}";
            
          
            $Crime_report->action_taken = "0";
            $Crime_report->land_parcel_id = $landid; //add relationship later
            $Crime_report->status = "1";
            $Crime_report->save();
            $id = Crime_report::latest()->first()->id;
            if($request->hasFile('images')){ 
                $i = count($request->images);
                for($y=0;$y<$i;$y++){
                    $file = $request->images[$y];
                    $filename =$file->getClientOriginalName();
                    $newname = $id.'NO'.$y.$filename;
                    $path = $file->storeAs('crimeEvidence',$newname,'public');
                    $photoarray[$y] = $path;            
                }
                $crime_rep = Crime_report::where('id',$id)->update(['photos' => json_encode($photoarray)]);
            }
            $org=Organization::where('title', $request['organization'])->first();
            $Process_item =new Process_item;
            $Process_item->created_by_user_id = $request['create_by'];
            $Process_item->request_organization = "1";
            //dd($org->city);
            $Process_item->activity_organization = $org->id;
            $Process_item->activity_user_id = null;
            $Process_item->form_id =  $id;
            $Process_item->form_type_id = "4";      
            $Process_item->status_id = "1";
            $Process_item->remark = "to be made yet";
            if($request->has('nonreguser')){
                $Process_item->requestor_email = $request['Requestor_email'];
                $Process_item->other_removal_requestor_name = $request['Requestor'];
            }
            $Process_item->save();
            $Process_itemnew =Process_item::latest()->first()->id;
            $successmessage='Crime report logged Successfully the ID of the application is '.$Process_itemnew;
            $Users = User::where('role_id', '=', 2)->get();
            Notification::send($Users, new ApplicationMade($Process_item));
            return $successmessage;
            
        });
        return redirect('/general/pending')->with('message', $array); 
               
    }  

    public function crime_report_form_display() {
        $Organizations = Organization::all();
        $crime_types = Crime_type::all();
        return view('crimeReport::logComplaint',['Organizations' => $Organizations],['crime_types' => $crime_types],);
    }

    public function download_image($path,$file) 
    {   
        dd($path,$file);    
        return Storage::disk('public')->download($path.'/'.$file);
       
    }

    public function view_image($path,$file) 
    {   
        $url = Storage::disk('public')->url($path.'/'.$file);
        return $url;
       
    }

    public function display_image($path,$file)
    {

    }

    public function view_crime_reports($id)
    {
        $process_item=Process_item::find($id);
        $crime = Crime_report::find($process_item->form_id);
        $Photos=Json_decode($crime->photos);
        $land_parcel = Land_Parcel::find($crime->land_parcel_id);
        return view('crimeReport::crimeview',[
            'crime' => $crime,
            'Photos' =>$Photos,
            'polygon' =>$land_parcel->polygon,
        ]);
    }

    //related to crime_types
    public function create_crime_type() {
        return view('crimeReport::crimeTypeCreate');
    }

    public function edit_crime_type($id) {
        $crime_type = Crime_type::find($id);
        return view('crimeReport::crimeTypeEdit', [
            'crime_type' => $crime_type,
        ]);
    }

    public function delete_crime_type($id) {
        $Crime_types = Crime_type::find($id);
        $Crime_types->delete();
        return redirect('/crime-report/crimehome')->with('messagetypes', 'Crime type Successfully Deleted');
    }

    public function store_crime_type() {
        $ctype = new Crime_type();
        $ctype->type = request('crimetype'); 
        $ctype->status = request('status');
        $ctype->save();
        return redirect('/crime-report/crimehome')->with('messagetypes', 'Crime Type Successfully Added');
    }

    public function update_crime_type(Request $request, $id)     
    {
        $crime_type = Crime_type::find($id);
        $crime_type->update([
            'type' => $request->type,
        ]);
        return redirect('/crime-report/crimehome')->with('messagetypes', 'Crime type Successfully Updated');   
    }
    
}

