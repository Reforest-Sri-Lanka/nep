<?php

namespace EnvironmentRestoration\Http\Controllers;
use App\Models\Environment_Restoration;
use App\Models\Environment_Restoration_Activity;
use App\Models\Environment_Restoration_Species;
use Illuminate\Http\Request;
use Validator;
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
        // $species = Environment_Restoration_Species::find($restoration->id); 
        $species = Environment_Restoration_Species::where('environment_restoration_id','=',($restoration->id))->get();              
        return view('environmentRestoration::show', [
            'restoration' => $restoration,
            'species' => $species,
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


    public function store(Request $request)
    {
        $restoration = new Environment_Restoration();
        $restoration->title = request('title');
        $restoration->environment_restoration_activity_id = request('environment_restoration_activity');
        $restoration->organization_id = request('organization');
        $restoration->eco_system_id = request('ecosystem');
        $restoration->land_parcel_id = request('land_parcel_id');
        $restoration->created_by_user_id = request('created_by');
        $restoration->status = request('status');

        $restoration->save();
        $latest = Environment_Restoration::latest()->first();
        $newres = $latest->id;
        //Adding to Environment Restoration Species Table using ajax
                $rules = array(
                //'environment_restoration_id.*'  => 'required',
                'statusSpecies.*'  => 'required',
                'species_id.*'  => 'required',
                'quantity.*'  => 'required',
                'height.*'  => 'required',
                'dimension.*'  => 'required',
                'remark.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            //$environment_restoration_id = $request->environment_restoration_id;
            $statusSpecies = $request->statusSpecies;
            $species_id = $request->species_id;
            $quantity = $request->quantity;
            $height = $request->height;
            $dimension = $request->dimension;
            $remark = $request->remark;
            for($count = 0; $count < count($species_id); $count++)
            {
            $data = array(
                'environment_restoration_id' => $newres,
                'status' => $statusSpecies[$count],
                'species_id'  => $species_id[$count],
                'quantity'  => $quantity[$count],
                'height'  => $height[$count],
                'dimensions'  => $dimension[$count],
                'remarks'  => $remark[$count],
            );
            $insert_data[] = $data; 
            }

            Environment_Restoration_Species::insert($insert_data);
            return redirect('/env-restoration/index')->with('message','New Environment Restoration Project Successfully Created');
        
    }
}