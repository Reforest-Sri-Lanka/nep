<?php

namespace EnvironmentRestoration\Http\Controllers;

use App\Models\Land_Parcel;
use App\Models\Environment_Restoration;
use App\Models\Environment_Restoration_Activity;
use App\Models\Environment_Restoration_Species;
use App\Models\Species_Information;
use App\Models\Restoration_Species_Update;
use App\Models\Restoration_Update;
use App\Models\Organization;
use App\Models\Process_Item;
use App\Models\Env_type;
use App\Models\Species;
use App\Models\User;
use App\Models\District;
use App\Models\Province;
use App\Models\GS_Division;
use App\Models\Gazette;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ApplicationMade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\CustomClass\organization_assign;
use App\CustomClass\lanparcel_creation;

class EnvironmentRestorationController extends Controller
{
    // public function index()
    // {
    //     $restorations = Environment_Restoration::all();       //show all records for index
    //     return view('environmentRestoration::index', [
    //         'restorations' => Environment_Restoration::paginate(10),
    //     ]);
    // }

    // public function myIndex()
    // {
    //     $userID = Auth::user()->id;
    //     $restorations = Environment_Restoration::where('created_by_user_id','=', $userID)->get();       //show all records for index
    //     return view('environmentRestoration::myIndex', [
    //         'restorations' => $restorations,
    //     ]);
    // }
    public function manage_environment_restorations() {
        $restorations = Process_Item::where('form_type_id',3)->orderby('id','desc')->paginate(10);
        
            return view('environmentRestoration::restorationHome', [
                'restorations' => $restorations,
            ]);
    }

    public function create_environment_restoration()
    {
        $restorations = Environment_Restoration::all();         //shows all records of enviroment restoration request
        $organizations = Organization::where('type_id', '=', '1')->get(); //show all records for all government organizations
        $restoration_activities = Environment_Restoration_Activity::all();
        $ecosystems = Env_type::all();
        $province = Province::all();
        $district = District::all();
        $gazettes = Gazette::all();
        $gs = GS_Division::orderBy('gs_division')->get();
        return view('environmentRestoration::create', [
            'restorations' => $restorations,
            'organizations' => $organizations,
            'gazettes' => $gazettes,
            'restoration_activities' => $restoration_activities,
            'ecosystems' => $ecosystems,
            'provinces' => $province,
            'districts' => $district,
            'gs' => $gs,
        ]);
    }

    public function show($id)           //show one record for moreinfo button
    {
        $process_item = Process_Item::find($id);
        $restoration = Environment_Restoration::find($process_item->form_id);
        //$restoration = Environment_Restoration::find($id);
        // $species = Environment_Restoration_Species::find($restoration->id); 
        $species = Environment_Restoration_Species::where('environment_restoration_id', ($restoration->id))->get();
        $land = Land_Parcel::find($restoration->land_parcel_id);
        $polygon = $land->pluck('polygon')->first();
        //ddd($restoration->environment_restoration_activity_id);
        //ddd($restoration->Environment_Restoration_Activity->title);
        //ddd($restoration->ecosystems_type->type);
        $govorgs = $land->pluck('governing_organizations');
        //ddd($land->title);
        //ddd($restoration->Status);
        return view('environmentRestoration::show', [
            'restoration' => $restoration,
            'species' => $species,
            'land' => $land,
            'polygon' => $polygon,
            'govorgs' => $govorgs,
            'process_item' =>$process_item,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'planNo' => 'required',
            'province' => 'required',
            'district' => 'required',
            'environment_restoration_activity_id' => 'required',
            'ecosystem' => 'required',
            'activity_org' => 'nullable|exists:organizations,title',
            'polygon' => 'required'
        ]);
        DB::transaction(function () use ($request) {

            $newland =lanparcel_creation::land_save($request);
            
            $restoration = new Environment_Restoration();
            $restoration->title = request('title');
            if(request('environment_restoration_activity_id')==NULL){
                $restoration->environment_restoration_activity_id = 1;
            }
            else{
                $restoration->environment_restoration_activity_id = request('environment_restoration_activity_id');
            }
            $restoration->organization_id = request('organization');
            $restoration->eco_system_id = request('ecosystem');
            $restoration->land_parcel_id = $newland;
            $restoration->created_by_user_id = request('createdBy');
            $restoration->status = request('status');
            $restoration->save();

            $latest = Environment_Restoration::latest()->first();
            $newres = $latest->id;
            
            //restoration process item
            $Process_item = new Process_Item();
            $Process_item->form_id = $newres;
            $Process_item->form_type_id = 3;
            $Process_item->created_by_user_id = request('createdBy');
            if($request->filled('activity_org')){
                $activityorgid = Organization::where('title', request('activity_org'))->pluck('id');
                $Process_item->activity_organization = $activityorgid[0];
            }
            $Process_item->request_organization = Auth::user()->organization_id;
            $Process_item->prerequisite_id = null;
            $Process_item->prerequisite = 0;
            $Process_item->status_id = 1;
            $Process_item->save();
            //+
            $latestprocess = Process_Item::latest()->first();
            if(empty($request->input('activity_org'))){
                organization_assign::auto_assign($latestprocess->id,request('district'),request('province'));
                $latestprocess =Process_Item::latest()->first();
            }
            else{
                $Admins = User::where('organization_id',$latestprocess->activity_organization)->whereBetween('role_id', [1, 2])->get();
                Notification::send($Admins, new ApplicationMade($latestprocess));
            }
            $process = new Process_Item();
            $process->form_type_id = 5;
            $process->form_id = $newland;
            $process->created_by_user_id = request('createdBy');
            $process->request_organization = Auth::user()->organization_id;
            $process->activity_organization = $latestprocess->activity_organization;
            $process->status_id = $latestprocess->status_id;
            $process->prerequisite_id = $latestprocess->id;
            $process->prerequisite = 0;
            $process->save();

            
            //Adding to Environment Restoration Species Table using ajax
            $rules = array(
                'statusSpecies.*'  => 'required',
                'species_name.*'  => 'required|exists:species_information,title',
                'quantity.*'  => 'required|integer',
                'height.*'  => 'required|integer',
                'dimension.*'  => 'required',
                'remark.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            
            $statusSpecies = $request->statusSpecies;
            $species_names = $request->species_name;
            $quantity = $request->quantity;
            $height = $request->height;
            $dimension = $request->dimension;
            $remark = $request->remark;
            for ($count = 0; $count < count($species_names); $count++) {
                $species_id = Species::where('title', $species_names[$count])->pluck('id');
                $data = array(
                    'environment_restoration_id' => $newres,
                    'status' => $statusSpecies[$count],
                    'species_id'  => $species_id[0],
                    'quantity'  => $quantity[$count],
                    'height'  => $height[$count],
                    'dimensions'  => $dimension[$count],
                    'remarks'  => $remark[$count],
                );
                $insert_data[] = $data;
            }
            Environment_Restoration_Species::insert($insert_data);

            //land request process item
            
            
        });

        return redirect('/general/pending')->with('message', 'Restoration Request Created Successfully');
    }

    public function progress_update($id)           //show one record for moreinfo button
    {
        $process_item = Process_Item::find($id);
        $restoration = Environment_Restoration::find($process_item->form_id);
        $Species = Environment_Restoration_Species::with('species')->where('environment_restoration_id', ($restoration->id))->get();
        $land = Land_Parcel::find($restoration->land_parcel_id);
        $data =$Species->toArray();
        //dd($data,$species);
        return view('environmentRestoration::progressUpdate', [
            'restoration' => $restoration,
            'data' => $data,
            'land' => $land,
            'polygon' => $land->polygon,
            'process_item' =>$process_item,
        ]);
    }

    public function progress_view($id)           //show one record for moreinfo button
    {
        $process_item = Process_Item::find($id);
        $restoration = Environment_Restoration::find($process_item->form_id);
        $restoration_update=Restoration_Update::where('env_rest_id', $restoration->id)->latest()->first();
        if($restoration_update == null){
            $restoration_updates=null;
            $data=null;
        }else{
            $restoration_updates=Restoration_Update::where('env_rest_id', $restoration->id)->get();
            $data=Restoration_Species_Update::where('env_rest_update_id', $restoration_update->id)->get();
        }
        $land = Land_Parcel::find($restoration->land_parcel_id);
       
        return view('environmentRestoration::progressView', [
            'restoration' => $restoration,
            'Updates' =>$restoration_updates,
            'Species' => $data,
            'land' => $land,
            'polygon' => $land->polygon,
            'process_item' =>$process_item,
        ]);
    }

    public function progress_save(Request $request)           //show one record for moreinfo button
    {
        $request->validate([
            'description' => 'required',
        ]);
        DB::transaction(function () use ($request) {
            $restoration_update = new Restoration_Update();
            $restoration_update->situation_update = request('description');
            if($request->filled('general_suggestions')){
            $restoration_update->suggestions = request('general_suggestions');
            }
            if($request->filled('general_remark')){
                $restoration_update->further_remarks = request('general_remark');
            }
            if($request->filled('restoration_id')){
            $restoration_update->env_rest_id = request('restoration_id');
            }
            if($request->filled('created_by')){
                $restoration_update->created_by = request('created_by');
            }
            
            $restoration_update->save();

            $latest = Restoration_Update::latest()->first();
            
            if($request->hasfile('file')) { 
                $y=0;
                foreach($request->file('file') as $file){
                    $filename =$file->getClientOriginalName();
                    $newname = $latest->id.'No'.$y.$filename;
                    $path = $file->storeAs('restoreUpdate',$newname,'public');
                    $photoarray[$y] = $path;  
                    $y++;          
                }
                //dd($photoarray);
                Restoration_Update::where('id',$latest->id)->update(['photos' => json_encode($photoarray)]);
            }
        
            //Adding to Environment Restoration Species Table using ajax
            $rules = array(
                'new_height.*'  => 'required',
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            
            
            $rest_species_id = $request->id;
            $new_height = $request->new_height;
            $suggestions = $request->suggestions;
            $tree_qty = $request->tree_qty;
            $remark = $request->remark;
            for ($count = 0; $count < count($rest_species_id); $count++) {
                $restoration_species_update = new Restoration_Species_Update();
                $restoration_species_update->env_rest_update_id=$latest->id;
                $restoration_species_update->env_rest_species_id=$rest_species_id[$count];
                $restoration_species_update->current_height=$new_height[$count];
                $restoration_species_update->improvement_suggestions=$suggestions[$count];
                $restoration_species_update->qty_of_successful_trees=$tree_qty[$count];
                $restoration_species_update->futher_remarks=$remark[$count];
                $restoration_species_update->save();
            }
        });
        return redirect('/general/pending')->with('message', 'Restoration Progress Updated Successfully');
        
    }

}
