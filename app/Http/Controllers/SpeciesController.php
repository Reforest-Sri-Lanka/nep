<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Species;
use App\Models\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SpeciesController extends Controller
{

    public function form()
    {
        $organization = Organization::all();
        return view('environment.species', [
            'org' => $organization,
        ]);
    }
    
public function store(Request $request){

    $request->validate([
        'type' => 'required',
        'title' => 'required',
        'scientific_name' => 'required',
        'habitat' =>'required',
        'taxanomy' =>'required',
        'description' => 'required',
        'createby' => 'required', 
        'status' => 'required',
    ]);
    $species = new Species;
    $species ->type=$request->input('type');
    $species ->title=$request->input('title');
    $species ->scientefic_name=$request->input('scientific_name');
    $species ->habitats=$request->input('habitat');
    $species ->taxa=$request->input('taxanomy');
    $species ->description=$request->input('description');
    $species->status_id=$request->input('status');
    
    $species ->created_by_user_id=$request->input('createby');
    $species ->save();


    
    return redirect('/requestspecies')->with('success', 'Data added successfully');



}


public function track(Request $request)
{
    $id=$request['create_by'];
    $species =Species ::all()->where('created_by_user_id',$id)->toArray();
    return view('environment.trackrequest');
   

}
public function index(){
    $species=Species::all();
    return view('environment.checkstatusspecies',compact('species',$species));





}


public function showRequest(){

$items=Species::where('created_by_user_id','=', Auth::user()->id)->get();
return view('environment.trackrequest',[
'items' =>$items,
]);

}

public function show($id)           //show one record for moreinfo button
{
    $items = Species::find($id);
    return view('environment/checkstatusspecies',compact('species','id'));
        
    
}


public function delete($id)
{

    $items=Species::find($id);

    $items->delete();

    
    
    return redirect()->back()->with('success', 'User Successfully Deleted');

}

public function statusupdate( Request $request, $id){
    $species = Species::find($id);
    $species->update([
        
        'status_id' => $request->status
    
    ]);
    
    return redirect()->back()->with('success', 'Request Approved Succesfully');



}


}
