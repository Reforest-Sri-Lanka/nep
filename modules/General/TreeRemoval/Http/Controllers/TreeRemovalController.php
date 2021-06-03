<?php

namespace TreeRemoval\Http\Controllers;

use App\Models\Tree_Removal_Request;
use App\Models\Land_Parcel;
use App\Models\Province;
use App\Models\District;
use App\Models\GS_Division;
use App\Models\Organization;
use App\Models\Process_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ApplicationMade;
use App\Models\User;
use App\Models\Species;
use App\CustomClass\organization_assign;


class TreeRemovalController extends Controller
{
    public function openForm()
    {
        $province = Province::all();
        $district = District::all();
        $gs = GS_Division::orderBy('gs_division')->get();
        return view('treeRemoval::form', [
            'provinces' => $province,
            'districts' => $district,
            'gs' => $gs,
        ]);
    }

    public function save(Request $request)
    {
        if ($request->hasfile('file')) {

            request()->validate([
                'file' => 'required',
                'file.*' => 'mimes:jpeg,jpg,png|max:40000'
            ]);
        }

        if (Auth()->user()->role_id != 6) {
            if (request('checklandowner') && request('checkremovalrequestor')) {
                $request->validate([
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'polygon' => 'required',
                    'number_of_trees' => 'required|integer',
                    'description' => 'required',
                    'land_extent' => 'nullable|numeric|between:0,99.999',
                    'removal_requestor' => 'required',
                    'land_owner' => 'required',
                    'removalrequestortype' => 'required|in:1,2',
                    'landownertype' => 'required|in:1,2',
                    'location.*.tree_species_id' => 'nullable|alpha',
                    'location.*.diameter_at_breast_height' => 'nullable|numeric',
                    'location.*.diameter_at_stump' => 'nullable|numeric',
                    'location.*.height' => 'nullable|numeric',
                    'location.*.timber_volume' => 'nullable|numeric',
                    'location.*.timber_cubic' => 'nullable|numeric',
                    'location.*.age' => 'nullable|numeric',
                    //'removal_requestor_email' => 'email|required'
                ]);
            } elseif (request('checkremovalrequestor')) {
                $request->validate([
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'polygon' => 'required',
                    'number_of_trees' => 'required|integer',
                    'description' => 'required',
                    'land_extent' => 'nullable|numeric|between:0,99.999',
                    'removal_requestor' => 'required',
                    'removalrequestortype' => 'required|in:1,2',
                    'land_owner' => 'required|exists:organizations,title',
                    'location.*.tree_species_id' => 'nullable|alpha',
                    'location.*.diameter_at_breast_height' => 'nullable|numeric',
                    'location.*.diameter_at_stump' => 'nullable|numeric',
                    'location.*.height' => 'nullable|numeric',
                    'location.*.timber_volume' => 'nullable|numeric',
                    'location.*.timber_cubic' => 'nullable|numeric',
                    'location.*.age' => 'nullable|numeric',
                    // 'removal_requestor_email' => 'email|required'
                ]);
            } elseif (request('checklandowner')) {
                $request->validate([
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'polygon' => 'required',
                    'number_of_trees' => 'required|integer',
                    'description' => 'required',
                    'land_extent' => 'nullable|numeric|between:0,99.999',
                    'removal_requestor' => 'required|exists:organizations,title',
                    'land_owner' => 'required',
                    'landownertype' => 'required|in:1,2',
                    'location.*.tree_species_id' => 'nullable|alpha',
                    'location.*.diameter_at_breast_height' => 'nullable|numeric',
                    'location.*.diameter_at_stump' => 'nullable|numeric',
                    'location.*.height' => 'nullable|numeric',
                    'location.*.timber_volume' => 'nullable|numeric',
                    'location.*.timber_cubic' => 'nullable|numeric',
                    'location.*.age' => 'nullable|numeric',
                ]);
            } else {
                $request->validate([
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'polygon' => 'required',
                    'number_of_trees' => 'required|integer',
                    'description' => 'required',
                    'land_extent' => 'nullable|numeric|between:0,99.999',
                    'removal_requestor' => 'required|exists:organizations,title',
                    'land_owner' => 'required|exists:organizations,title',
                    'location.*.tree_species_id' => 'nullable|alpha',
                    'location.*.diameter_at_breast_height' => 'nullable|numeric',
                    'location.*.diameter_at_stump' => 'nullable|numeric',
                    'location.*.height' => 'nullable|numeric',
                    'location.*.timber_volume' => 'nullable|numeric',
                    'location.*.timber_cubic' => 'nullable|numeric',
                    'location.*.age' => 'nullable|numeric',
                ]);
            }
        }
        if (Auth()->user()->role_id = 6) {
            if (request('checkremovalrequestor')) {
                $request->validate([
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'polygon' => 'required',
                    'number_of_trees' => 'required|integer',
                    'description' => 'required',
                    'land_extent' => 'nullable|numeric|between:0,99.999',
                    'removal_requestor' => 'required',
                    'removalrequestortype' => 'required|in:1,2',
                    'location.*.tree_species_id' => 'nullable|alpha',
                    'location.*.diameter_at_breast_height' => 'nullable|numeric',
                    'location.*.diameter_at_stump' => 'nullable|numeric',
                    'location.*.height' => 'nullable|numeric',
                    'location.*.timber_volume' => 'nullable|numeric',
                    'location.*.timber_cubic' => 'nullable|numeric',
                    'location.*.age' => 'nullable|numeric',
                    // 'removal_requestor_email' => 'email|required'
                ]);
            } else {
                $request->validate([
                    'planNo' => 'required',
                    'surveyorName' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'gs_division' => 'required',
                    'polygon' => 'required',
                    'number_of_trees' => 'required|integer',
                    'description' => 'required',
                    'land_extent' => 'nullable|numeric|between:0,99.999',
                    'removal_requestor' => 'required|exists:organizations,title',
                    'location.*.tree_species_id' => 'nullable|alpha',
                    'location.*.diameter_at_breast_height' => 'nullable|numeric',
                    'location.*.diameter_at_stump' => 'nullable|numeric',
                    'location.*.height' => 'nullable|numeric',
                    'location.*.timber_volume' => 'nullable|numeric',
                    'location.*.timber_cubic' => 'nullable|numeric',
                    'location.*.age' => 'nullable|numeric',
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


            $land->polygon = request('polygon');

            $land->created_by_user_id = request('createdBy');

            if (request('isProtected')) {
                $land->protected_area = request('isProtected');
            }
            $land->status_id = 1;
            $land->save();

            $landid = Land_Parcel::latest()->first()->id;


            $tree = new Tree_Removal_Request();

            //Required and/or filled in fields
            $tree->created_by_user_id = request('createdBy');
            $tree->description = request('description');
            $tree->no_of_trees = request('number_of_trees');
            $tree->governing_organizations = Organization::where('title', $governing_organizations1)->pluck('id');

            //Default value/ non-compulsory fields
            if (request('land_extent')) {
                $tree->land_size = request('land_extent');
            }
            if (request('number_of_flora_species')) {
                $tree->no_of_flora_species = request('number_of_flora_species');
            }
            if (request('number_of_avian_species')) {
                $tree->no_of_avian_species = request('number_of_avian_species');
            }
            if (request('number_of_reptile_species')) {
                $tree->no_of_reptile_species = request('number_of_reptile_species');
            }
            if (request('number_of_reptile_species')) {
                $tree->no_of_amphibian_species = request('number_of_amphibian_species');
            }
            if (request('number_of_mammal_species')) {
                $tree->no_of_mammal_species = request('number_of_mammal_species');
            }
            if (request('number_of_tree_species')) {
                $tree->no_of_tree_species = request('number_of_tree_species');
            }
            if (request('species_special_notes')) {
                $tree->species_special_notes = request('species_special_notes');
            }
            $tree->land_parcel_id = $landid;
            $tree->tree_locations = request('location');

            $tree->save();

            $latest = Tree_Removal_Request::latest()->first();
            if ($request->hasfile('file')) {
                $y = 0;
                foreach ($request->file('file') as $file) {
                    $filename = $file->getClientOriginalName();
                    $newname = $latest->id . 'No' . $y . $filename;
                    $path = $file->storeAs('treeremoval', $newname, 'public');
                    $photoarray[$y] = $path;
                    $y++;
                }
                $tree = Tree_Removal_Request::where('id', $latest->id)->update(['images' => json_encode($photoarray)]);
            }
            $process = new Process_Item();
            $process->form_type_id = 1;
            $process->form_id = $latest->id;
            $process->created_by_user_id = request('createdBy');
            //$process->request_organization = Auth::user()->organization_id;
            //$process->activity_organization = $governing_organization;
            //Getting the IDs of organizations to create the activity_organization and request_organization in rocess item table

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

            $process->save();
            $Users = User::where('role_id', '=', 2)->get();
            Notification::send($Users, new ApplicationMade($process));

            //process item for the land parcel
            $latestTreeProcess = Process_Item::latest()->first();
            $org_id =organization_assign::auto_assign($latestTreeProcess->id,$request->district,$request->province);
            $landProcess = new Process_Item();
            $landProcess->form_id = $landid;
            $landProcess->remark = "Verify these land details";
            $landProcess->prerequisite = 0;

            $landProcess->status_id = 1;
            $landProcess->form_type_id = 5;
            $landProcess->created_by_user_id = request('createdBy');
            $landProcess->prerequisite_id = $latestTreeProcess->id;

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
            /* if (request('checkremovalrequestor')) {
                $landProcess->other_removal_requestor_name = request('removal_requestor');
                $landProcess->other_removal_requestor_type = request('removalrequestortype');
                if (request('removal_requestor_email') == null) {
                    $landProcess->requestor_email = "no email";
                } else {
                    $landProcess->requestor_email = request('removal_requestor_email');
                }
            } else {
                $removal_requestor = Organization::where('title', request('removal_requestor'))->pluck('id');
                
            } */
            
                $landProcess->activity_organization = $removal_requestor[0];
            

            $landProcess->save();

            $users = User::where('role_id', '=', 2)->where('id', '!=', $request['createdBy'])->get();
            Notification::send($users, new ApplicationMade($landProcess));
        });

        return redirect('/general/pending')->with('message', 'Request Created Successfully');
    }

    public function show($id)
    {
        $item = Process_Item::find($id);
        $tree_removal = Tree_Removal_Request::find($item->form_id);
        $location_data = $tree_removal->tree_locations;
        $land_data = Land_Parcel::find($tree_removal->land_parcel_id);
        return view('treeRemoval::show', [
            'tree' => $tree_removal,
            'location' => $location_data,
            'land' => $land_data,
            'other_removal_requestor' => $item->other_removal_requestor_name,
            'process' => $item,
            'polygon' => $land_data->polygon,
        ]);
    }

    public function destroy($processid, $treeid, $landid)
    {
        $prereqs = Process_Item::where("prerequisite_id", "=", $processid)->pluck('id');
        //ddd($processid, $treeid, $landid, $prereqs[0]);

        DB::transaction(function () use ($processid, $treeid, $landid, $prereqs) {

            $landParcelProcess = Process_Item::find($prereqs[0]);
            $landParcelProcess->delete();

            $treeRemovalProcess = Process_Item::find($processid);
            $treeRemovalProcess->delete();

            $treeRemoval = Tree_Removal_Request::find($treeid);
            $treeRemoval->delete();

            $landParcel = Land_Parcel::find($landid);
            $landParcel->delete();
        });
        return redirect('/approval-item/showRequests')->with('message', 'Request Successfully Deleted');
    }

    public function provinceAutocomplete(Request $request)
    {
        $data = Province::select("province")
            ->where("province", "LIKE", "%{$request->terms}%")
            ->get();

        return response()->json($data);
    }

    public function SpeciesAutocomplete(Request $request)
    {
        $data = Species::select("title")
            ->where("title", "LIKE", "%{$request->terms}%")
            ->get();

        return response()->json($data);
    }

    public function districtAutocomplete(Request $request)
    {
        $data = District::select("district")
            ->where("district", "LIKE", "%{$request->terms}%")
            ->get();

        return response()->json($data);
    }

    public function organizationAutocomplete(Request $request)
    {
        $data = Organization::select("title")
            ->where("title", "LIKE", "%{$request->terms}%")
            ->where("id", "!=", "6")
            ->get();

        return response()->json($data);
    }

    public function GSAutocomplete(Request $request)
    {
        $data = GS_Division::select("gs_division")
            ->where("gs_division", "LIKE", "%{$request->terms}%")
            ->get();

        return response()->json($data);
    }
}
