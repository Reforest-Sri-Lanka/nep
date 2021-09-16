<?php

namespace DevelopmentProject\Http\Controllers;

use App\Models\Development_Project;
use App\Models\Land_Parcel;
use App\Models\Gazette;
use App\Models\Province;
use App\Models\District;
use App\Models\GS_Division;
use App\Models\Organization;
use App\Models\User;
use App\Models\Process_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ApplicationMade;
use Illuminate\Support\Facades\DB;
use App\CustomClass\organization_assign;
use App\CustomClass\Landparcel;
use Carbon\Carbon;

class DevelopmentProjectController extends Controller
{
    //development project form_type_id = 2 

    public function manage_development_projects() {
        $development_projects = Process_Item::where('form_type_id',2)->orderby('id','desc')->paginate(10);
        
            return view('developmentProject::developmentProjectHome', [
                'development_projects' => $development_projects,
            ]);
    }

    //Returns the view for the application form passing in data of lands, organziations and gazettes
    public function create_development_project()
    {
        $province = Province::all();
        $district = District::all();
        $gs = GS_Division::orderBy('gs_division')->get();
        $organizations = Organization::where('type_id', '=', '1')->get();
        $gazettes = Gazette::all();
        return view('developmentProject::createDevProject', [
            'provinces' => $province,
            'districts' => $district,
            'gs' => $gs,
            'organizations' => $organizations,
            'gazettes' => $gazettes,
        ]);
    }

    // Saves the form to the development projects table as well as creates 1 or more entries in the process items table
    // depending on the number of governing organizations selected.
    public function store_development_project(Request $request)
    {   
        if ($request->filled('checklandowner')) {
            $request->validate([
                'title' => 'required',
                'province' => 'required',
                'district' => 'required',
                'polygon' => 'required',
                'land_owner' => 'required',
                'landownertype' => 'required|in:1,2',
                'organization' => 'nullable|exists:organizations,title',
            ]);
        } else {
            $request->validate([
                'title' => 'required',
                'province' => 'required',
                'district' => 'required',
                'polygon' => 'required',
                'land_owner' => 'required|exists:organizations,title',
                'organization' => 'nullable|exists:organizations,title',
            ]);
        }

        DB::transaction(function () use ($request) {
            //s1 : create land parcel for the development project
            $land_parcel_id = Landparcel::create_land_parcel($request);

            //s2: create the development project -> use the landparcel ID from step 1
            $development_project = new Development_Project();
            $development_project->title = request('title');
            
            //s2.1: load related gazette if any - would be nice to have this as a public method from gazettes controller later
            $gazette = Gazette::where('gazette_number', request('gazette'))->pluck('id');
            if($gazette->isNotEmpty())
                $development_project->gazette_id = $gazette[0];
            else
                $development_project->gazette_id = 1; // the migration seeders create id 1 gazette as No-Gazette

            $development_project->governing_organizations = json_encode( request('governing_orgs') );
            $development_project->land_parcel_id = $land_parcel_id;
            $development_project->logs = json_encode(array(Carbon::now()->toDateTimeString(), 'Proporsal submitted'));
            $development_project->created_by_user_id = Auth::user()->id;
            
            if ($request->filled('isProtected')) { //PENDING : need to create a process to alert the env governance mechanism for PA check later
                $development_project->protected_area = request('isProtected');
            }
            //saving the coordinates in string form. when giving back to the map it needs to be converted back into JSON in the script.
            $development_project->save();

            //s3: create process item for the development project
            $development_project_process = new Process_Item();
            $development_project_process->form_type_id = 2;
            $development_project_process->form_id = $development_project->id;
            $development_project_process->created_by_user_id = Auth::user()->id;
            $development_project_process->request_organization = Auth::user()->organization_id;
            
            //s3.1: check if landowner should be checked process - PENDING : create checking process
            if ($request->filled('checklandowner')) {
                $development_project_process->other_land_owner_name = request('land_owner');
                $development_project_process->other_land_owner_type = request('landownertype');
            }
            
            //s4: user might optionally send dev project request to a specific organization
            if($request->filled('forward-request-to-organization')){
                $organization = Organization::where('title', $request['forward-request-to-organization'])->pluck('id');
                if(isset($organization[0]))
                    $development_project_process->activity_organization = $organization[0];
            }
            $development_project_process->save(); 

            //s5: send assign organization to oversee processing of dev project or notify the admins of the org forwarded to in s4 
            if(empty($request->input('forward-request-to-organization'))){
                $org_assign_id = organization_assign::auto_assign($development_project_process->id,request('district'),request('province'));
                $latestDevProcess =Process_Item::latest()->first(); //refractor
            }
            else{
                $Admins = User::where('organization_id',$development_project_process->activity_organization)->whereBetween('role_id', [1, 2])->get();
                Notification::send($Admins, new ApplicationMade($development_project_process));
            }

            //s6: create a process item for land parcel for the devproject 
            $land_process = new Process_Item();
            $land_process->form_id = $land_parcel_id;
            $land_process->remark = "Please verify these land details";
            $land_process->prerequisite = 0;
            
            if(isset($latestDevProcess)){ //s6.1: if auto-assigned to organization 
                $land_process->status_id = $latestDevProcess->status_id;
                $land_process->prerequisite_id = $latestDevProcess->id;
                $land_process->activity_organization = $latestDevProcess->activity_organization;
            }else{
                $land_process->status_id = $development_project_process->status_id;
                $land_process->prerequisite_id = $development_project_process->id;
                $land_process->activity_organization = $development_project_process->activity_organization;
            }
            
            $land_process->form_type_id = 5; //5 is the form_types table id for land parcels form
            $land_process->created_by_user_id = request('createdBy');
           
            //s6.2: assign land process request organization 
            if (Auth()->user()->role_id = 6) { //role id 6 = citizen
                $land_process->request_organization = 1; //1 is no-organization and usually means a citizen request. can add another check here to see if platform allows citizen requests
            } else {
                if (request('checklandowner')) {
                    $land_process->other_land_owner_name = request('land_owner');
                    $land_process->other_land_owner_type = request('landownertype');
                } else {
                    $land_owner = Organization::where('title', request('land_owner'))->pluck('id');
                    if(isset($land_owner[0]))
                    $land_process->request_organization = $land_owner[0];
                }
            }

            $land_process->save();
        });
        return redirect('/general/pending')->with('message', 'Development Project Created Successfully');
    }

    public function show($id)
    {
        $process_item = Process_Item::find($id);
        $development_project = Development_Project::find($process_item->form_id);
        $land_data = Land_Parcel::find($development_project->land_parcel_id);
        return view('developmentProject::show', [
            'development_project' => $development_project,
            'land' => $land_data,
            'polygon' => $land_data->polygon,
            'process' => $process_item,
        ]);
    }

    public function destroy($processid, $devid, $landid)
    {
        $prereqs = Process_Item::where("prerequisite_id", "=", $processid)->pluck('id');
        //ddd($processid, $treeid, $landid, $prereqs[0]);

        DB::transaction(function () use ($processid, $devid, $landid, $prereqs) {

            $landParcelProcess = Process_Item::find($prereqs[0]);
            $landParcelProcess->delete();

            $devProjectProcess = Process_Item::find($processid);
            $devProjectProcess->delete();

            $devProject = Development_Project::find($devid);
            $devProject->delete();

            $landParcel = Land_Parcel::find($landid);
            $landParcel->delete();
        });
        return redirect('/approval-item/showRequests')->with('message', 'Request Successfully Deleted');
    }

    public function edit($processid, $devid, $landid)
    {
        $process = Process_Item::find($processid);
        $dev = Development_Project::find($devid);
        return view('developmentProject::edit', [
            'process' => $process,
            'dev' => $dev,
        ]);
    }

    public function gazetteAutocomplete(Request $request)
    {
        $data = Gazette::select("gazette_number")
            ->where("gazette_number", "LIKE", "%{$request->terms}%")
            ->get();

        return response()->json($data);
    }
}
