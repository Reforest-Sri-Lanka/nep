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



class TreeRemovalController extends Controller
{
    public function openForm()
    {
        return view('treeRemoval::form');
    }

    public function save(Request $request)
    {
        $land = new Land_Parcel();
        $land->title = request('landTitle');

        $governing_organizations1 = request('removal_requestor');
        $land->governing_organizations = Organization::where('title', $governing_organizations1)->pluck('id');

        $land->polygon = request('polygon');
        $land->created_by_user_id = request('createdBy');
        if (request('isProtected')) {
            $land->protected_area = request('isProtected');
        }
        $land->save();

        $landid = Land_Parcel::latest()->first()->id;

        $tree = new Tree_Removal_Request();
        $tree->created_by_user_id = request('createdBy');
        $tree->description = request('description');
        $tree->land_size = request('land_extent');
        $tree->no_of_trees = request('number_of_trees');
        $tree->no_of_tree_species = request('number_of_tree_species');
        $tree->no_of_mammal_species = request('number_of_mammal_species');
        $tree->no_of_amphibian_species = request('number_of_amphibian_species');
        $tree->no_of_reptile_species = request('number_of_reptile_species');
        $tree->no_of_avian_species = request('number_of_avian_species');
        $tree->no_of_flora_species = request('number_of_flora_species');
        $tree->species_special_notes = request('species_special_notes');
        $tree->land_parcel_id = $landid;
        //$tree->district_id = request('district_id');
        //$tree->province_id = request('province_id');
        //$tree->gs_division_id = request('gs_division_id');
        //$tree->governing_organizations = request('governing_orgs');

        $district_id1 = District::where('district', request('district'))->pluck('id');
        $tree->district_id = $district_id1[0];

        $province_id1 = Province::where('province', request('province'))->pluck('id');
        //$tree->province_id = Province::where('province','=',$province_id1)->get();
        $tree->province_id = $province_id1[0];

        $gs_division_id1 = GS_Division::where('gs_division', request('gs_division'))->pluck('id');
        $tree->gs_division_id = $gs_division_id1[0];

        $tree->governing_organizations = Organization::where('title', $governing_organizations1)->pluck('id');

        $tree->tree_locations = request('location');

        $tree->save();

        $latest = Tree_Removal_Request::latest()->first();

        foreach ($latest->governing_organizations as $governing_organization) {
            $process = new Process_Item();
            $process->form_type_id = 1;
            $process->form_id = $latest->id;
            $process->created_by_user_id = request('createdBy');
            //$process->request_organization = Auth::user()->organization_id;
            //$process->activity_organization = $governing_organization;

            //Getting the IDs of organizations to create the activity_organization and request_organization in rocess item table



            if (request('checklandowner')) {
                $process->other_land_owner_name = request('land_owner');
                $process->other_land_owner_type = request('landownertype');
            } else {
                $land_owner = Organization::where('title', request('land_owner'))->pluck('id');
                $process->request_organization = $land_owner[0];
            }
            if (request('checkremovalrequestor')) {
                $process->other_removal_requestor_name = request('removal_requestor');
                $process->other_removal_requestor_type = request('removalrequestortype');
            } else {
                $removal_requestor = Organization::where('title', request('removal_requestor'))->pluck('id');
                $process->activity_organization = $removal_requestor[0];
            }
            $process->save();
        }
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
            'polygon' => $land_data->polygon,
        ]);
    }

    public function provinceAutocomplete(Request $request)
    {
        $data = Province::select("province")
            ->where("province", "LIKE", "%{$request->terms}%")
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
