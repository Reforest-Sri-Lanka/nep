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
use App\Models\Land_Has_Organization;
use App\Models\Crime_report;
use App\Models\Crime_type;
use App\Models\User;
use App\Models\Process_Item;
use App\Models\District;
use App\Models\Gazette;
use App\Models\Province;
use App\Models\Organization;
use App\CustomClass\organization_assign;
use App\CustomClass\lanparcel_creation;
use PDF;

class CrimeReportController extends Controller
{

    public function crime_home_display() {
        
        $view_crimes = Process_Item::where('form_type_id',4)->orderby('id','desc')->paginate(15);
        
            return view('crimeReport::crimeMain', [
                'view_crimes' => $view_crimes,
            ]);
    }
    public function create_crime_report(Request $request)
    {   
        $request -> validate([
            'crime_type' => 'required|not_in:0',
            'description' => 'required',
            'planNo' => 'required',
            'confirm' => 'required',
            //'district' => 'required|not_in:0',
            //'province' => 'required|not_in:0',
            'polygon' => 'required',
            //'organization' => 'nullable|exists:organizations,title',
        ]);
        if($request->hasfile('file')){
            
            request()->validate([
                'file' => 'required',
                'file.*' => 'mimes:jpeg,jpg,png|max:40000'
            ]);
        }
        if($request['createdBy'] == null){
            $request['createdBy'] =11;
        }
        
        $array=DB::transaction(function () use($request) {
            
            $landid =lanparcel_creation::land_save($request);
            $Crime_report = new Crime_report;
            $Crime_report->Created_by_user_id = $request['createdBy'];
            $Crime_report->crime_type_id = $request['crime_type'];
            $Crime_report->description = $request['description'];
            $Crime_report->photos = "{}";
            $Crime_report->logs = "{}";
            $Crime_report->action_taken = "0";
            $Crime_report->land_parcel_id = $landid; //add relationship later
            $Crime_report->status = "1";
            $Crime_report->save();
            $id = Crime_report::latest()->first()->id;
            if($request->hasfile('file')) { 
                $y=0;
                foreach($request->file('file') as $file){
                    $filename =$file->getClientOriginalName();
                    $newname = $id.'No'.$y.$filename;
                    $path = $file->storeAs('crimeEvidence',$newname,'public');
                    $photoarray[$y] = $path;  
                    $y++;          
                }
                //dd($photoarray);
                $crime_rep = Crime_report::where('id',$id)->update(['photos' => json_encode($photoarray)]);
            }
            //$org=Organization::where('title', $request['organization'])->first();
            $user=User::find($request['createdBy']);
            $Process_item =new Process_Item;
            $Process_item->created_by_user_id = $request['createdBy'];
            $Process_item->request_organization = $user->organization_id;
            $Process_item->activity_user_id = null;
            if($request->filled('contact')){
                $Process_item->requestor_email = $request['contact'];
            }
            $Process_item->form_id =  $id;
            $Process_item->form_type_id = 4;      
            $Process_item->remark = "to be made yet";
            if($request->filled('organization')){
                $organization = Organization::where('title', $request['organization'])->pluck('id');
                $org_id =$organization[0];
                $Process_item->activity_organization = $org_id;
            }
            $Process_item->save();
            $latestcrimeProcess = Process_Item::latest()->first();
            if(empty($request->input('organization'))){
                $org_id =organization_assign::auto_assign($latestcrimeProcess->id,26,request('province'));
                $latestcrimeProcess =Process_Item::latest()->first();
            }
            else{
                $Admins = User::where('organization_id',$latestcrimeProcess->activity_organization)->whereBetween('role_id', [1, 2])->get();
                Notification::send($Admins, new ApplicationMade($latestcrimeProcess));
            }
            $landProcess = new Process_Item();
            $landProcess->form_id = $landid;
            $landProcess->remark = "Verify these land details";
            $landProcess->prerequisite = 0;
            $landProcess->activity_organization = $org_id;
            $landProcess->status_id = $latestcrimeProcess->status_id;
            $landProcess->form_type_id = 5;
            $landProcess->created_by_user_id = $request['createdBy'];
            $landProcess->prerequisite_id = $latestcrimeProcess->id;
            $landProcess->save();

            $latestlandprocess=Process_Item::latest('id')->first();
 
            lanparcel_creation::landprocesses_save($request,$landid,$latestcrimeProcess->id);
            $id=$latestcrimeProcess->id;
           /*  $Users = User::where('role_id', '=', 2)->where('id', '!=', $request['createdBy'])->get();
            Notification::send($Users, new ApplicationMade($latestcrimeProcess)); */
            return $id;
            
        });
        $message ='Crime report logged Successfully the ID of the application is '.$array;
        if(Auth::user()){
            return redirect('/general/pending')->with('message', $message); 
        }else{
            $pdf = PDF::loadView('crimeReport::reference', [
                'id' => $array,
            ]);
            return $pdf->stream('crime_report_reference.pdf');
        }
               
    }  

    public function crime_report_form_display() {
        $organizations = Organization::where('type_id', '=', '1')->get();
        $crime_types = Crime_type::all();
        $province = Province::all();
        $district = District::all();
        $gazettes = Gazette::all();
        if(Auth::user()){
            return view('crimeReport::logComplaint', [
                'organizations' => $organizations,
                'crime_types' => $crime_types,
                'provinces' => $province,
                'districts' => $district,
                'gazettes' => $gazettes,
            ]);
        }else{
            return view('crimeReport::complaint', [
                'organizations' => $organizations,
                'crime_types' => $crime_types,
                'provinces' => $province,
                'districts' => $district,
                'gazettes' => $gazettes,
            ]);
        }
          
        //return view('crimeReport::logComplaint',['Organizations' => $Organizations],['crime_types' => $crime_types],);
    }

    public function crime_report_edit($pid) {
        $process_item =Process_Item::find($pid);
        if($process_item->created_by_user_id != Auth::user()->id ){
            return redirect('/general/pending')->with('warning', 'You are only allowed to edit complaints logged by yourself');
        }elseif(($process_item->status_id > 1) && ($process_item->status_id < 9)){
            return redirect('/general/pending')->with('warning', 'Cannot edit after the approval process has begun');
        }
        $crime = Crime_report::find($process_item->form_id);
        $crime_types = Crime_type::all();
        $Photos = Json_decode($crime->photos);
        return view('crimeReport::crimeEdit', [
            'process_item' => $process_item,
            'crime' => $crime,
            'crime_types' => $crime_types,
            'Photos' =>$Photos,
        ]);
    }

    public function update_crime_report(Request $request)
    {   
        $request -> validate([
            'crime_type' => 'required|not_in:0',
            'description' => 'required',
        ]);
        if($request->hasfile('file')){
            
            request()->validate([
                'file' => 'required',
                'file.*' => 'mimes:jpeg,jpg,png|max:40000'
            ]);
        }
        $array=DB::transaction(function () use($request) {
            
            $Process_item =Process_Item::find($request->pid);
            $Crime_report =Crime_report::find($Process_item->form_id);
            $Crime_report->update([
                'crime_type_id' => $request->crime_type,
                'description' => $request->description,
            ]);
            if($request->hasfile('file')) { 
                $y=0;
                foreach($request->file('file') as $file){
                    $filename =$file->getClientOriginalName();
                    $newname = $Crime_report->id.'No'.$y.$filename;
                    $path = $file->storeAs('crimeEvidence',$newname,'public');
                    $photoarray[$y] = $path;  
                    $y++;          
                }
                $newarray=array_merge($photoarray,Json_decode($Crime_report->photos));
                $Crime_report->photos= json_encode($newarray);
                $Crime_report->save();
            }
            $Process_item->update([
                'requestor_email' => $request->contact,
            ]);
        });
        return back()->with('message', 'Crime report updated Successfully');            
    } 
    public function download_image($path,$file) 
    {   
        //dd($path,$file);    
        return Storage::disk('public')->download($path.'/'.$file);
       
    }

    public function view_image($path,$file) 
    {   
        $url = Storage::disk('public')->url($path.'/'.$file);
        return $url;
       
    }


    public function view_crime_reports($id)
    {
        $process_item=Process_Item::find($id);
        $crime = Crime_report::find($process_item->form_id);
        $Photos=Json_decode($crime->photos);
        $land_parcel = Land_Parcel::find($crime->land_parcel_id);
            return view('crimeReport::crimeview',[
                'crime' => $crime,
                'process_item' => $process_item,
                'Photos' =>$Photos,
                'polygon' =>$land_parcel->polygon,
            ]);
    }

    public function track_crime_reports(Request $request)
    {
        $request -> validate([
            'reference_id' => 'required|exists:process_items,id',
        ]);
        $process_item = Process_Item::find(request('reference_id'));
        $crime = Crime_report::find($process_item->form_id);
        $Photos=Json_decode($crime->photos);
        $land_parcel = Land_Parcel::find($crime->land_parcel_id);
        
        if($process_item->created_by_user_id != 11 && ((Auth::check())) == 0){
            return redirect('/home/unRegistered')->with('danger', 'This application is not anonymous and is not accessible'); 
        }else{
            return view('crimeReport::crimeview',[
                'crime' => $crime,
                'process_item' => $process_item,
                'Photos' =>$Photos,
                'polygon' =>$land_parcel->polygon,
            ]);
        }
        
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

