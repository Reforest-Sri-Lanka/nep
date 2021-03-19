<?php

namespace General\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Process_Item;

class GeneralController extends Controller
{

    public function showRequests()
    {
        $items = Process_Item::where('created_by_user_id', '=', Auth::user()->id)->get();
        return view('approvalItem::requests', [
            'items' => $items,
        ]);
    }

    public function pending()
    {
        $organization = Auth::user()->organization_id;
        $role = Auth::user()->role_id;
        $id = Auth::user()->id;

        //IF ADMIN DISPLAYS ALL THE PENDING REQUESTS TO BE ASSIGNED
        if ($role == 1 || $role == 2 ) {
            $Process_items = Process_Item::all()->where('status_id', 1);
            return view('general::generalA', [
                'Process_items' => $Process_items,
            ]);
        }
        //IF HOO OR MANAGER, DISPLAYS ALL THE PENDING REQUESTS OF THEIR ORGANIZATION
        if ($role == 3 || $role == 4){
            $Process_items = Process_Item::all()->where('status_id','>=',2)->where('activity_organization',$organization);
            return view('general::generalA', [
                'Process_items' => $Process_items,
            ]);
        }

        //IF STAFF DISPLAYS ALL THE REQUESTS ASSIGNED TO THEM
        else if ($role == 5) {
            $Process_items = Process_Item::all()->where('activity_user_id', $id);
            return view('general::generalA', compact('Process_items'));
        }
        //IF CITIZEN, DISPLAYS THE REQUESTS MADE
        else if($role == 6){
            $Process_items = Process_Item::all()->where('created_by_user_id',$id);
            return view('general::generalA',[
                'Process_items' => $Process_items,
            ]);
        } else {
            return view('unauthorized')->with('message', 'Access Denied');
        }
    }

    public function filter_process_items(Request $request)
    {
        $request->validate([
            'form_type' => 'required|not_in:0',
        ]);
        $type = $request['form_type'];
        $organization = Auth::user()->organization_id;
        $role = Auth::user()->role_id;
        $id = Auth::user()->id;

        if ($role == 1 || $role == 2){
            $Process_items = Process_Item::all()->where('form_type_id',$type);
            return view('general::generalA', [
                'Process_items' => $Process_items,
            ]);
        }

        if ($role == 3 || $role == 4) {
            $Process_items = Process_Item::all()->where('activity_organization', $organization)->where('form_type_id', $type)->where('status_id','>=',2);
            return view('general::generalA', [
                'Process_items' => $Process_items,
            ]);
        } else if ($role == 5) {
            $Process_items = Process_Item::all()->where('activity_user_id', $id)->where('form_type_id', $type)->toArray();
            return view('general::.generalA', compact('Process_items'));
        } else if ($role == 6) {
            $Process_items = Process_Item::all()->where('created_by_user_id', $id)->where('form_type_id', $type)->toArray();
            return view('general::.generalA', compact('Process_items'));
        } else {
            return view('unauthorized')->with('message', 'No access to general module');
        }
    }

}
