<?php

namespace General\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Process_item;

class GeneralController extends Controller
{
    public function home()
    {
        $name = 'Yashod';
        return view('general::home', compact('name'));
    }

    public function filter_process_items(Request $request)
    {
        $request -> validate([
            'form_type' => 'required|not_in:0',
        ]);
        $type =$request['form_type'];
        $organization=Auth::user()->organization_id;
        $role = Auth::user()->role_id;
        $id= Auth::user()->id;
        /* if ($role == 1 || $role == 2 || $role == NULL ){
            $Process_items = Process_item::all()->where('activity_organization',$noOrganization)->toArray();
            return view('general::generalA',compact('Process_items'));
        } */
        if ($role == 3 || $role == 4){
            $Process_items = Process_item::all()->where('activity_organization',$organization)->where('form_type_id',$type)->toArray();
            return view('general::generalM',compact('Process_items'));
        }
        else if($role == 5){
            $Process_items = Process_item::all()->where('activity_user_id',$id)->where('form_type_id',$type)->toArray();
            return view('general::.generalS',compact('Process_items'));
        }
        else if($role == 6){
            $Process_items = Process_item::all()->where('created_by_user_id',$id)->where('form_type_id',$type)->toArray();
            return view('general::.generalC',compact('Process_items'));
        }
        else{
            return view('unauthorized')->with('message', 'Admins are not allowed access to general module');
        }
    }

    
    public function showRequests()
    {
        $items = Process_Item::where('created_by_user_id', '=', Auth::user()->id)->get();
        return view('approvalItem::requests', [
            'items' => $items,
        ]);
    }
	
	public function general_module_access_control()
    {
        
        $organization=Auth::user()->organization_id;
        $noOrganization=2;
        $role = Auth::user()->role_id;
        $id= Auth::user()->id;
        /* if ($role == 1 || $role == 2 || $role == NULL ){
            $Process_items = Process_item::all()->where('activity_organization',$noOrganization)->toArray();
            return view('general::generalA',compact('Process_items'));
        } */
        if ($role == 3 || $role == 4){
            $Process_items = Process_item::all()->where('activity_organization',$organization);
            //return view('general::generalM',compact('Process_items'));
            
            return view('general::generalM', [
                'Process_items' => $Process_items,
            ]);
        }
        else if($role == 5){
            $Process_items = Process_item::all()->where('activity_user_id',$id)->toArray();
            return view('general::.generalS',compact('Process_items'));
        }
        else if($role == 6){
            $Process_items = Process_item::all()->where('created_by_user_id',$id)->toArray();
            return view('general::.generalC',compact('Process_items'));
        }
        else{
            return view('unauthorized')->with('message', 'Admins are not allowed access to general module');
        }

        
    }
}
