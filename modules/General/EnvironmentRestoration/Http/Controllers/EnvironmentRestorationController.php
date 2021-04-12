<?php

namespace EnvironmentRestoration\Http\Controllers;

use App\Models\Land_Parcel;
use App\Models\Environment_Restoration;
use App\Models\Environment_Restoration_Activity;
use App\Models\Environment_Restoration_Species;
use App\Models\Organization;
use App\Models\Process_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Env_type;
use App\Models\Species;
use Illuminate\Support\Facades\DB;

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

    public function create()
    {
        $restorations = Environment_Restoration::all();         //shows all records of enviroment restoration request
        $organizations = Organization::where('type_id', '=', '1')->get(); //show all records for all government organizations
        $restoration_activities = Environment_Restoration_Activity::all();
        $ecosystems = Env_type::all();
        return view('environmentRestoration::create', [
            'restorations' => $restorations,
            'organizations' => $organizations,
            'restoration_activities' => $restoration_activities,
            'ecosystems' => $ecosystems
        ]);
    }

    public function show($id)           //show one record for moreinfo button
    {
        $restoration = Environment_Restoration::find($id);
        // $species = Environment_Restoration_Species::find($restoration->id); 
        $species = Environment_Restoration_Species::where('environment_restoration_id', ($restoration->id))->get();
        return view('environmentRestoration::show', [
            'restoration' => $restoration,
            'species' => $species,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'landparceltitle' => 'required',
            'environment_restoration_activity' => 'required',
            'environment_restoration_activity' => 'required',
            'ecosystem' => 'required',
            'activity_org' => 'required|exists:organizations,title',
            'polygon' => 'required'
        ]);
        DB::transaction(function () use ($request) {

            $landparcel = new Land_Parcel();
            $landparcel->title = request('landparceltitle');
            $landparcel->polygon = request('polygon');
            $landparcel->governing_organizations = request('govOrg');
            $landparcel->protected_area = request('isProtected');
            $landparcel->created_by_user_id = request('created_by');
            $landparcel->save();

            $latest = Land_Parcel::latest()->first();
            $newland = $latest->id;

            $restoration = new Environment_Restoration();
            $restoration->title = request('title');
            $restoration->environment_restoration_activity_id = request('environment_restoration_activity');
            $restoration->organization_id = request('organization');
            $restoration->eco_system_id = request('ecosystem');
            $restoration->land_parcel_id = $newland;
            $restoration->created_by_user_id = request('created_by');
            $restoration->status = request('status');

            $restoration->save();
            $latest = Environment_Restoration::latest()->first();
            $newres = $latest->id;
            $activityorgname = request('activity_org');
            $activityorgid = Organization::where('title', $activityorgname)->pluck('id');
            $Process_item = new Process_Item();
            $Process_item->form_id = $latest->id;
            $Process_item->form_type_id = 3;
            $Process_item->created_by_user_id = request('created_by');
            $Process_item->activity_organization = $activityorgid[0];
            $Process_item->request_organization = request('organization');
            $Process_item->activity_user_id = 0;
            $Process_item->prerequisite_id = 0;
            $Process_item->prerequisite = 0;
            $Process_item->status_id = 1;
            $Process_item->save();
            //+
            $latestprocess = Process_Item::latest()->first();

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

            //land request
            $latest = Land_Parcel::latest()->first();
            $process = new Process_Item();
            $process->form_type_id = 3;
            $process->form_id = $latest->id;
            $process->created_by_user_id = request('created_by');
            $process->activity_user_id = 0;
            $process->request_organization = request('organization');
            $process->activity_organization = $activityorgid[0];
            $process->prerequisite_id = $latestprocess->id;
            $process->prerequisite = 0;
            $process->save();
        });

        return redirect('/general/pending')->with('message', 'Restoration Request Created Successfully');
    }
}
