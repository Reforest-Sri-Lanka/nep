<?php

namespace Security\Http\Controllers;

use App\Models\User;
use App\Models\Process_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Environment\Http\Controllers\EnvController;
use Environment\Http\Controllers\SpeciesController;
use App\Models\Role_has_access;

class SecurityController extends Controller
{
    
    public function moredetails($id,$pid)
    {
        $process_item = Process_Item::find($pid);
        $audit = $process_item->audits()->find($id);
        $data =$audit->old_values;
        $datanew=$audit->new_values;
        //dd($audit);
        return view('Security::recordsview', [
            'data' => $data,
            'datanew' => $datanew,
            'audit' => $audit,
            'process_item' =>$process_item,
        ]);
    }

    public function auditdisplay($id)
    {
        $process_item = Process_Item::find($id);
        $Audits = $process_item->audits()->get();
        
        return view('Security::mainview', [
            'Audits' => $Audits,
            'process_item' => $process_item,
        ]);
    }

    public function usermoredetails($id,$uid)
    {
        $user = User::find($uid);
        $audit = $user->audits()->find($id);
        $data =$audit->old_values;
        $datanew=$audit->new_values;
        //dd($audit);
        return view('Security::recordsview', [
            'data' => $data,
            'datanew' => $datanew,
            'audit' => $audit,
            'user' =>$user,
        ]);
    }

    public function userauditdisplay($id)
    {
        $user = User::find($id);
        $Audits = $user->audits()->get();
        
        return view('Security::mainview', [
            'Audits' => $Audits,
            'user' => $user,
        ]);
    }


    public function speciesredirect()
    {
        $role = Auth::user()->role_id;
        if($role != 1){
            $access1 = Role_has_access::where('role_id',$role)->where('access_id',2)->first();;
            if($access1 == null)
            {
                return redirect()->action([SpeciesController::class, 'index2']);
            }
        }
        return redirect()->action([SpeciesController::class, 'index']);
    }

    

}
