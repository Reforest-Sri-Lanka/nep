<?php

namespace DevelopmentProject\Http\Controllers;

use App\Models\Development_Project;
use App\Models\Land_Parcel;
use App\Models\Gazette;
use App\Models\Organization;
use App\Models\Process_Item;
use Illuminate\Http\Request;
use App\Models\Test_Map;
use Illuminate\Support\Facades\Auth;


class DevelopmentProjectController extends Controller
{
    //     $name = 'Yashod';
    //     return view('developmentProject::home', compact('name'));


    public function test()
    {
        return view('developmentProject::index');
    }

    //Returns the view for the application form passing in data of lands, organziations and gazettes
    public function form()
    {

        $coords = Development_Project::latest()->first()->logs;


        $lands = Land_Parcel::all();
        $gazettes = Gazette::all();
        $organizations = Organization::all();
        return view('developmentProject::form', [
            'lands' => $lands,
            'gazettes' => $gazettes,
            'organizations' => $organizations,
            'coordinates' => $coords,
        ]);
    }

    // Saves the form to the development projects table as well as creates 1 or more entries in the process items table
    // depenign on the number of governing organizations selected.
    public function save(Request $request)
    {

        $land = new Land_Parcel();
        $land->title = request('landTitle');
        $land->governing_organizations = request('governing_orgs');
        $land->polygon = request('polygon');
        $land->created_by_user_id = request('createdBy');
        if (request('isProtected')) {
            $land->protected_area = request('isProtected');
        }
        $land->save();

        $landid = Land_Parcel::latest()->first()->id;

        $dev = new Development_Project();
        $dev->title = request('title');
        $dev->gazette_id = request('gazette');
        $dev->governing_organizations = request('governing_orgs');
        $dev->land_parcel_id = $landid;
        $dev->created_by_user_id = request('createdBy');
        if (request('isProtected')) {
            $dev->protected_area = request('isProtected');
        }
        //saving the coordinates in string form. when giving back to the map it needs to be converted back into JSON in the script.
        $dev->logs = request('polygon');
        $dev->save();

        $latest = Development_Project::latest()->first();

        foreach ($latest->governing_organizations as $governing_organization) {
            $process = new Process_Item();
            $process->form_type_id = 2;
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
        $process_item = Process_Item::find($id);
        $development_project = Development_Project::find($process_item->form_id);
        $land_data = Land_Parcel::find($development_project->land_parcel_id);
        return view('developmentProject::show', [
            'development_project' => $development_project,
            'polygon' => $land_data->polygon,
        ]);
    }
}
