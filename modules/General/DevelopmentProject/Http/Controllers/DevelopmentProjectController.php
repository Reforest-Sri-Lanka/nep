<?php

namespace DevelopmentProject\Http\Controllers;

use App\Models\Development_Project;
use App\Models\Land_Parcel;
use App\Models\Gazette;
use App\Models\Organization;
use App\Models\User;
use App\Models\Process_Item;
use Illuminate\Http\Request;
use App\Models\Test_Map;
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
        return view('developmentProject::form',[
            'provinces' => $province,
            'districts' => $district,
        ]);  
    }

    // Saves the form to the development projects table as well as creates 1 or more entries in the process items table
    // depenign on the number of governing organizations selected.
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'planNo' => 'required',
            'surveyorName' => 'required',
            'organization' => 'required|exists:organizations,title',
            'district' => 'required|not_in:0',
            'province' => 'required|not_in:0',
            'gazette' => 'required|exists:gazettes,gazette_number',
            'polygon' => 'required',
        ]);
        DB::transaction(function () use ($request) {
            $land = new Land_Parcel();
            $land->title = request('planNo');
            $land->surveyor_name = request('surveyorName');
            if (request('organization') != null) {
            $governing_organizations1 = request('organization');
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

            //$organization_id1 = Organization::where('title', request('organization'))->pluck('id');
            //$process->activity_organization = $organization_id1[0];

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
            $landProcess->request_organization = auth()->user()->organization_id;
            $landProcess->activity_organization = $org_id;
            $landProcess->status_id = 1;
            $landProcess->form_type_id = 5;
            $landProcess->created_by_user_id = request('createdBy');
            $landProcess->prerequisite_id = $latestDevProcess->id;
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

            $treeRemovalProcess = Process_Item::find($processid);
            $treeRemovalProcess->delete();

            $treeRemoval = Development_Project::find($devid);
            $treeRemoval->delete();

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
