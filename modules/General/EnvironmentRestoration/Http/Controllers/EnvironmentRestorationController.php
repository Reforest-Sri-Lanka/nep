<?php

namespace EnvironmentRestoration\Http\Controllers;
use App\Models\Environment_Restoration;
use App\Models\Environment_Restoration_Activity;
use App\Models\Environment_Restoration_Species;
use Illuminate\Http\Request;
use App\Http\Controllers\Hash;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class EnvironmentRestorationController extends Controller
{
    
    public function index()
    {
        $restorations = Environment_Restoration::all();       //show all records for index
        return view('environmentRestoration::index', [
            'restorations' => $restorations,
        ]);
    }

    public function myIndex()
    {
        $userID = Auth::user()->id;
        $restorations = Environment_Restoration::where('created_by_user_id','=', $userID)->get();       //show all records for index
        return view('environmentRestoration::myIndex', [
            'restorations' => $restorations,
        ]);
    }

    public function create()
    {
        $restorations = Environment_Restoration::all();       //show all records for index
        return view('environmentRestoration::create', [
            'restorations' => $restorations,
        ]);
    }

    public function show($id)           //show one record for moreinfo button
    {
        $restoration = Environment_Restoration::find($id);                
        return view('environmentRestoration::show', [
            'restoration' => $restoration,
        ]);
    }

/*     public function edit($id)           //to open the edit view
    {
        $restoration = EnvironmentRestoration::find($id);
        return view('envRestoration/envRestorationEdit', [
            'restoration' => $restorations,
        ]);
    } */

/*     public function update(Request $request, $id)       //to update the data via edit
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
        ]);
        //ddd($request);
        return redirect ('/envRestoration/index')->with('message', 'Restoration Project Updated Successfully');
    } */


    public function store()
    {
        $restoration = new Environment_Restoration();
        $restoration->title = request('title');
        $restoration->environment_restoration_activity_id = request('environment_restoration_activity');
        $restoration->organization_id = request('organization');
        $restoration->eco_system_id = request('ecosystem');
        $restoration->land_parcel_id = request('land_parcel_id');
        //$restoration->species = request('species');
        $restoration->created_by_user_id = request('created_by');
        $restoration->status = request('status');

        $restoration->save();
        //$count=$_GET["count"];
        $restorespecies = new Environment_Restoration_Species();
        //for ($i=0;$i<$count;$i++) {
            $restorespecies->environment_restoration_id = $restoration->id;
            $restorespecies->species_id = request('species_id');
            $restorespecies->quantity = request('quantity');
            $restorespecies->height = request('height');
            $restorespecies->dimensions = request('dimension');
            $restorespecies->remarks = request('remark');
            $restorespecies->status = request('status_species');

            $restorespecies->save();
        //}
        return redirect('/env-restoration/index')->with('message','New Environment Restoration Project Successfully Created');
        
    }
}