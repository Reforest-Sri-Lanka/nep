<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Env;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EnvController extends Controller
{

    public function show($id)           //show one record for moreinfo button
    {
        $ecosystems = Env::find($id);
        return view('environment/checkstatuseco',compact('ecosystems','id'));
            
        
    }
    
    
    public function store(Request $request){
        $request->validate([
            'type' => 'required',
            'description' => 'required',
            'createby' => 'required', 
            
            
        ]);
        $ecosystems = new Env;
        $ecosystems->ecosystem_type=$request->input('type');
        $ecosystems->description=$request->input('description');
        $ecosystems ->created_by_user_id=$request->input('createby');
        
        
        $ecosystems->save();

        
        return redirect('/createrequest')->with('success', 'Data added successfully');







    }

    public function index(){
        $ecosystems=Env::all();
        return view('environment.checkstatuseco',compact('ecosystems',$ecosystems));




    }

/* public function edit($id){
    $ecosystems= Env::select ('select * from eco_systems where id = ?',[$id]);

return view('')

 */

    public function delete($id)
{

    $ecosystems=Env::findorFail($id);

    $ecosystems->delete();

    return redirect('environmentcheckstatuseco')->with('success', 'Data deleted  successfully');

}




public function track(){

    $items=Env::where('created_by_user_id','=', Auth::user()->id)->get();
    return view('environment.trackrequesteco')->with('items', $items);
   
    
    
    }









}

