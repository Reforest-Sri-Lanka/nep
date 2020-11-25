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
    // public function home()
    // {
    //     $name = 'Yashod';
    //     return view('treeRemoval::home', compact('name'));
    // }

    public function openForm()
    {
        $lands = Land_Parcel::all();
        $provinces = Province::all();
        $districts = District::all();
        $gs_divisions = GS_Division::all();
        $organizations = Organization::all();
        return view('treeRemoval::form', [
            'lands' => $lands,
            'provinces' => $provinces,
            'districts' => $districts,
            'gs_divisions' => $gs_divisions,
            'organizations' => $organizations,

        ]);
    }

    public function save()
    {
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
        $tree->land_parcel_id = request('land_parcel_id');
        $tree->district_id = request('district_id');
        $tree->province_id = request('province_id');
        $tree->gs_division_id = request('gs_division_id');
        $tree->tree_locations = request('location');
        $tree->governing_organizations = request('governing_orgs');
        $tree->save();

        $latest = Tree_Removal_Request::latest()->first();

        foreach ($latest->governing_organizations as $governing_organization) {
            $process = new Process_Item();
            $process->form_type_id = 1;
            $process->form_id = $latest->id;
            $process->created_by_user_id = request('createdBy');
            $process->requst_organization = Auth::user()->organization_id;
            $process->activity_organization = $governing_organization;
            $process->save();
        }
        return redirect('/general/general')->with('message', 'Request Created Successfully');
    }

    public function show($id)
    {
        $item = Process_Item::find($id);
        $tree_removal = Tree_Removal_Request::find($item->form_id);
        $location_data = $tree_removal->tree_locations;
        // ddd($location_data[0]['tree_species_id']);
        return view('treeRemoval::show', [
            'tree' => $tree_removal,
            'location' => $location_data,
        ]);
    }
}
