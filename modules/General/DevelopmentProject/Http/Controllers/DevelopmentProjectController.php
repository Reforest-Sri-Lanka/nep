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
    public function test()
    {
        return view('developmentProject::index');
    }

    //Returns the view for the application form passing in data of lands, organziations and gazettes
    public function form()
    {
        $organizations = Organization::all();
        return view('developmentProject::form', [
            'organizations' => $organizations,
        ]);
    }

    // Saves the form to the development projects table as well as creates 1 or more entries in the process items table
    // depenign on the number of governing organizations selected.
    public function save(Request $request)
    {
        $land = new Land_Parcel();
        $land->title = request('landTitle');
        
        $governing_organizations1 = request('organization');
        $land->governing_organizations = Organization::where('title', $governing_organizations1)->pluck('id');

        $land->polygon = request('polygon');
        $land->created_by_user_id = request('createdBy');
        if (request('isProtected')) {
            $land->protected_area = request('isProtected');
        }
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

        $latest = Development_Project::latest()->first();

        foreach ($latest->governing_organizations as $governing_organization) {
            $process = new Process_Item();
            $process->form_type_id = 2;
            $process->form_id = $latest->id;
            $process->created_by_user_id = request('createdBy');
            $process->request_organization = Auth::user()->organization_id;
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

    public function gazetteAutocomplete(Request $request)
    {
        $data = Gazette::select("gazette_number")
                ->where("gazette_number","LIKE","%{$request->terms}%")
                ->get();

        return response()->json($data);
    }
}
