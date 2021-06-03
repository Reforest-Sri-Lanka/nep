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
use App\Models\District;
use App\Models\Province;


class DevelopmentProjectController extends Controller
{

    //Returns the view for the application form passing in data of lands, organziations and gazettes
    public function form()
    {
        $province = Province::all();
        $district = District::all();
        $gs = GS_Division::orderBy('gs_division')->get();
        return view('developmentProject::form', [
            'provinces' => $province,
            'districts' => $district,
            'gs' => $gs,
        ]);
    }

    // Saves the form to the development projects table as well as creates 1 or more entries in the process items table
    // depenign on the number of governing organizations selected.
    public function save(Request $request)
    {
        if (Auth()->user()->role_id != 6) {
            if (request('checklandowner') && request('checkremovalrequestor')) {
                $request->validate([
                    'title' => 'required',
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'gazette' => 'required|exists:gazettes,gazette_number',
                    'polygon' => 'required',
                    'removal_requestor' => 'required',
                    'land_owner' => 'required',
                    'removalrequestortype' => 'required|in:1,2',
                    'landownertype' => 'required|in:1,2',
                    //'removal_requestor_email' => 'email|required'
                ]);
            } elseif (request('checkremovalrequestor')) {
                $request->validate([
                    'title' => 'required',
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'gazette' => 'required|exists:gazettes,gazette_number',
                    'polygon' => 'required',
                    'removal_requestor' => 'required',
                    'removalrequestortype' => 'required|in:1,2',
                    'land_owner' => 'required|exists:organizations,title',
                    // 'removal_requestor_email' => 'email|required'
                ]);
            } elseif (request('checklandowner')) {
                $request->validate([
                    'title' => 'required',
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'gazette' => 'required|exists:gazettes,gazette_number',
                    'polygon' => 'required',
                    'removal_requestor' => 'required|exists:organizations,title',
                    'land_owner' => 'required',
                    'landownertype' => 'required|in:1,2',
                ]);
            } else {
                $request->validate([
                    'title' => 'required',
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'gazette' => 'required|exists:gazettes,gazette_number',
                    'polygon' => 'required',
                    'removal_requestor' => 'required|exists:organizations,title',
                    'land_owner' => 'required|exists:organizations,title',
                ]);
            }
        }
        if (Auth()->user()->role_id = 6) {
            if (request('checkremovalrequestor')) {
                $request->validate([
                    'title' => 'required',
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'gazette' => 'required|exists:gazettes,gazette_number',
                    'polygon' => 'required',
                    'removal_requestor' => 'required',
                    'removalrequestortype' => 'required|in:1,2',
                    // 'removal_requestor_email' => 'email|required'
                ]);
            } else {
                $request->validate([
                    'title' => 'required',
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'gazette' => 'required|exists:gazettes,gazette_number',
                    'polygon' => 'required',
                    'removal_requestor' => 'required|exists:organizations,title',
                ]);
            }
        }


        DB::transaction(function () use ($request) {
            $land = new Land_Parcel();
            $land->title = request('planNo');
            $land->surveyor_name = request('surveyorName');
            $land->district_id = $request->district;
            $land->province_id = $request->province;
            $land->gs_division_id = $request->gs_division;

            $governing_organizations1 = request('removal_requestor');
            $land->governing_organizations = Organization::where('title', $governing_organizations1)->pluck('id');
            }
            $land->polygon = request('polygon');
            $land->created_by_user_id = request('createdBy');
            if (request('isProtected')) {
                $land->protected_area = request('isProtected');
            }
            $land->status_id = 1;
            $land->save();

            $landid = Land_Parcel::latest()->first()->id;

            $dev = new Development_Project();
            $dev->title = request('title');
            //$dev->gazette_id = request('gazette');

            $gazette = Gazette::where('gazette_number', request('gazette'))->pluck('id');
            $dev->gazette_id = $gazette[0];

            $dev->governing_organizations = Organization::where('title', $governing_organizations1)->pluck('id');

            $dev->land_parcel_id = $landid;
            $dev->created_by_user_id = request('createdBy');
            if (request('isProtected')) {
                $dev->protected_area = request('isProtected');
            }
            //saving the coordinates in string form. when giving back to the map it needs to be converted back into JSON in the script.
            $dev->save();

            //process item for the development project
            $latest = Development_Project::latest()->first();
            $process = new Process_Item();
            $process->form_type_id = 2;
            $process->form_id = $latest->id;
            $process->created_by_user_id = request('createdBy');
            $process->request_organization = Auth::user()->organization_id;

            if (Auth()->user()->role_id = 6) {
                $process->request_organization = 6;
            } else {
                if (request('checklandowner')) {
                    $process->other_land_owner_name = request('land_owner');
                    $process->other_land_owner_type = request('landownertype');
                } else {
                    $land_owner = Organization::where('title', request('land_owner'))->pluck('id');
                    $process->request_organization = $land_owner[0];
                }
            }
            if (request('checkremovalrequestor')) {
                $process->other_removal_requestor_name = request('removal_requestor');
                $process->other_removal_requestor_type = request('removalrequestortype');
                if (request('removal_requestor_email') == null) {
                    $process->requestor_email = "no email";
                } else {
                    $process->requestor_email = request('removal_requestor_email');
                }
            } else {
                $removal_requestor = Organization::where('title', request('removal_requestor'))->pluck('id');
                $process->activity_organization = $removal_requestor[0];
            }

            $process->status_id = 1;
            $process->save();

            $users = User::where('role_id', '<', 3)->get();
            Notification::send($users, new ApplicationMade($process));

            //process item for the land parcel
            $latestDevProcess = Process_Item::latest()->first();
            //$district_id = District::where('district', request('district'))->pluck('id'); 
            $org_id =organization_assign::auto_assign($latestDevProcess->id,request('district'),request('province'));
            $landProcess = new Process_Item();
            $landProcess->form_id = $landid;
            $landProcess->remark = "Verify these land details";
            $landProcess->prerequisite = 0;
            $landProcess->status_id = 1;
            $landProcess->form_type_id = 5;
            $landProcess->created_by_user_id = request('createdBy');
            $landProcess->prerequisite_id = $latestDevProcess->id;

            if (Auth()->user()->role_id = 6) {
                $landProcess->request_organization = 6;
            } else {
                if (request('checklandowner')) {
                    $landProcess->other_land_owner_name = request('land_owner');
                    $landProcess->other_land_owner_type = request('landownertype');
                } else {
                    $land_owner = Organization::where('title', request('land_owner'))->pluck('id');
                    $landProcess->request_organization = $land_owner[0];
                }
            }
            if (request('checkremovalrequestor')) {
                $landProcess->other_removal_requestor_name = request('removal_requestor');
                $landProcess->other_removal_requestor_type = request('removalrequestortype');
                if (request('removal_requestor_email') == null) {
                    $landProcess->requestor_email = "no email";
                } else {
                    $landProcess->requestor_email = request('removal_requestor_email');
                }
            } else {
                $removal_requestor = Organization::where('title', request('removal_requestor'))->pluck('id');
                $landProcess->activity_organization = $removal_requestor[0];
            }
            $landProcess->save();

            $users = User::where('role_id', '=', 2)->where('id', '!=', $request['createdBy'])->get();
            Notification::send($users, new ApplicationMade($landProcess));
        });
        return redirect('/general/pending')->with('message', 'Request Created Successfully');
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
