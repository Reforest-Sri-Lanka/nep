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
Use App\Notifications\ApplicationMade;
use App\Models\User;



class TreeRemovalController extends Controller
{
    public function openForm()
    {
        return view('treeRemoval::form');
    }

    public function save(Request $request)
    {
        
        if (request('checklandowner') && request('checkremovalrequestor')) {
            $request->validate([
                'landTitle' => 'required',
                'province' => 'required|exists:provinces,province',
                'district' => 'required|exists:districts,district',
                'gs_division' => 'required|exists:gs_divisions,gs_division',
                'removal_requestor' => 'required',
                'land_owner' => 'required',
                'removalrequestortype' => 'required|in:1,2',
                'landownertype' => 'required|in:1,2',
                'polygon' => 'required',
                'number_of_trees' => 'required|integer',
                'description' => 'required',
                'land_extent' => 'sometimes|integer'
            ]);
        } elseif (request('checkremovalrequestor')) {
            $request->validate([
                'landTitle' => 'required',
                'province' => 'required|exists:provinces,province',
                'district' => 'required|exists:districts,district',
                'gs_division' => 'required|exists:gs_divisions,gs_division',
                'removal_requestor' => 'required',
                'removalrequestortype' => 'required|in:1,2',
                'land_owner' => 'required|exists:organizations,title',
                'polygon' => 'required',
                'number_of_trees' => 'required|integer',
                'description' => 'required',
                'land_extent' => 'sometimes|integer'
            ]);
        } elseif (request('checklandowner')) {
            $request->validate([
                'landTitle' => 'required',
                'province' => 'required|exists:provinces,province',
                'district' => 'required|exists:districts,district',
                'gs_division' => 'required|exists:gs_divisions,gs_division',
                'removal_requestor' => 'required|exists:organizations,title',
                'land_owner' => 'required',
                'landownertype' => 'required|in:1,2',
                'polygon' => 'required',
                'number_of_trees' => 'required|integer',
                'description' => 'required',
                'land_extent' => 'sometimes|integer'
            ]);
        } else {
            $request->validate([
                'landTitle' => 'required',
                'province' => 'required|exists:provinces,province',
                'district' => 'required|exists:districts,district',
                'gs_division' => 'required|exists:gs_divisions,gs_division',
                'removal_requestor' => 'required|exists:organizations,title',
                'land_owner' => 'required|exists:organizations,title',
                'polygon' => 'required',
                'number_of_trees' => 'required|integer',
                'description' => 'required',
                'land_extent' => 'sometimes|integer'
            ]);
        }
        
            
        // $request->validate([
        //     'landTitle' => 'required',
        //     'province' => 'required|exists:provinces,province',
        //     'district' => 'required|exists:districts,district',
        //     'gs_division' => 'required|exists:gs_divisions,gs_division',
        //     'removal_requestor' => 'required',
        //     'land_owner' => 'required',
        //     'polygon' => 'required',
        //     'number_of_trees' => 'required|integer',
        //     'description' => 'required',
        //     'land_extent' => 'integer'
        // ]);
        DB::transaction(function () use($request) {
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

        //Required and/or filled in fields
        $tree->created_by_user_id = request('createdBy');
        $tree->description = request('description');
        $tree->no_of_trees = request('number_of_trees');
        $district_id1 = District::where('district', request('district'))->pluck('id');
        $tree->district_id = $district_id1[0];

        $province_id1 = Province::where('province', request('province'))->pluck('id');
        $tree->province_id = $province_id1[0];

        $gs_division_id1 = GS_Division::where('gs_division', request('gs_division'))->pluck('id');
        $tree->gs_division_id = $gs_division_id1[0];

        $tree->governing_organizations = Organization::where('title', $governing_organizations1)->pluck('id');


        //Default value/ non-compulsory fields
        if(request('land_extent')){
            $tree->land_size = request('land_extent');
        }
        if(request('number_of_flora_species')){
            $tree->no_of_flora_species = request('number_of_flora_species');
        }
        if(request('number_of_avian_species')){
            $tree->no_of_avian_species = request('number_of_avian_species');
        }
        if(request('number_of_reptile_species')){
            $tree->no_of_reptile_species = request('number_of_reptile_species');
        }
        if(request('number_of_reptile_species')){
            $tree->no_of_amphibian_species = request('number_of_amphibian_species');
        }
        if(request('number_of_mammal_species')){
            $tree->no_of_mammal_species = request('number_of_mammal_species');
        }
        if(request('number_of_tree_species')){
            $tree->no_of_tree_species = request('number_of_tree_species');
        }
        if(request('species_special_notes')){
            $tree->species_special_notes = request('species_special_notes');
        }
        
        
        $tree->land_parcel_id = $landid;
        //$tree->district_id = request('district_id');
        //$tree->province_id = request('province_id');
        //$tree->gs_division_id = request('gs_division_id');
        //$tree->governing_organizations = request('governing_orgs');
        $tree->tree_locations = request('location');

        $tree->save();


        $latest = Tree_Removal_Request::latest()->first();
        if(request('images')){ 
            //dd($request->images);
            $i = count($request->images);
            for($y=0;$y<$i;$y++){
                $file = $request->images[$y];
                $filename =$file->getClientOriginalName();
                $newname = $latest->id.'NO'.$y.$filename;
                $path = $file->storeAs('crimeEvidence',$newname,'public');
                $photoarray[$y] = $path;            
            }
            $tree = Tree_Removal_Request::where('id',$latest->id)->update(['images' => json_encode($photoarray)]);
        }

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
            $Users = User::where('role_id', '=', 2)->get();
            Notification::send($Users, new ApplicationMade($process));
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
