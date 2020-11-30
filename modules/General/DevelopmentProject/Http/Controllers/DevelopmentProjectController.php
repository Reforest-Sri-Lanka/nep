<?php

namespace DevelopmentProject\Http\Controllers;

use App\Models\Development_Project;
use App\Models\Land_Parcel;
use App\Models\Gazette;
use App\Models\Organization;
use App\Models\Process_Item;
use Illuminate\Http\Request;

class DevelopmentProjectController extends Controller
{
    // public function home()
    // {
    //     $name = 'Yashod';
    //     return view('developmentProject::home', compact('name'));
    // }

    public function test()
    {
        return view('developmentProject::index');
    }

    //Returns the view for the application form passing in data of lands, organziations and gazettes
    public function form()
    {
        $lands = Land_Parcel::all();
        $gazettes = Gazette::all();
        $organizations = Organization::all();
        return view('developmentProject::form', [
            'lands' => $lands,
            'gazettes' => $gazettes,
            'organizations' => $organizations,
        ]);
    }

    // Saves the form to the development projects table as well as creates 1 or more entries in the process items table
    // depenign on the number of governing organizations selected.
    public function save()
    {
        $dev = new Development_Project();
        $dev->title = request('title');
        $dev->gazette_id = request('gazette');
        $dev->governing_organizations = request('governing_orgs');
        $dev->land_parcel_id = request('landParcel');
        $dev->created_by_user_id = request('createdBy');
        if (request('isProtected')) {
            $dev->protected_area = request('isProtected');
        }
        $dev->save();

        $latest = Development_Project::latest()->first();

        foreach ($latest->governing_organizations as $governing_organization) {
            $process = new Process_Item();
            $process->form_type_id = 2;
            $process->form_id = $latest->id;
            $process->created_by_user_id = request('createdBy');
            $process->requst_organization = 0;
            $process->activity_organization = $governing_organization;
            $process->save();
        }
        return redirect('/general/general')->with('message', 'Request Created Successfully');
    }

    public function show($id)
    {   
        $item = Process_Item::find($id);
        $dev = Development_Project::find($item->form_id);
        return view('developmentProject::show', [
            'dev' => $dev,
        ]);
    }
}
