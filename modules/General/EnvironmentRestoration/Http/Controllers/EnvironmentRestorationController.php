<?php

namespace App\Http\Controllers;
use App\Models\EnvironmentRestoration;
use App\Models\EnvironmentRestorationActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Hash;
use App\Http\Controllers\Auth;
use App\Http\Requests\UserRequest;

class envRestorationController extends Controller
{
    public function index()
    {

        $restorations = EnvironmentRestoration::all();       //show all records for index
        return view('envRestoration/envRestorationIndex', [
            'restorations' => $restorations,
        ]);
    }

    public function show($id)           //show one record for moreinfo button
    {
        $restoration = EnvironmentRestoration::find($id);                
        return view('envRestoration/envRestorationShow', [
            'restoration' => $restoration,
        ]);
    }

    public function edit($id)           //to open the edit view
    {
        $restoration = EnvironmentRestoration::find($id);
        return view('envRestoration/envRestorationEdit', [
            'restoration' => $restorations,
        ]);
    }

    public function update(Request $request, $id)       //to update the data via edit
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
        ]);
        //ddd($request);
        return redirect ('/envRestoration/index')->with('message', 'Restoration Project Updated Successfully');
    }


    public function store(Request $request)
    {
        $restoration = new EnvironmentRestoration();
        $restoration->title = $request->title;
        $restoration->environment_restoration_activity_id = $request->er_activity;
        $restoration->organization_id = $request->organization;
        $restoration->ecosystem_id = $request->ecosystem;
        $restoration->land_parcel_id = $request->landParcelID;
        $restoration->species = $request->species;
        $restoration->created_by_user_id = $request->created_by;
        $restoration->status = $request->status;

        

        $restoration->save();
        return redirect('/envRestoration/index')->with('message','New Environment Restoration Project Successfully Created');
    }
}