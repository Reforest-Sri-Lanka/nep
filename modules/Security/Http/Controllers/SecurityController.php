<?php

namespace Security\Http\Controllers;

use App\Models\User;
use App\Models\Process_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Crime_report;


class SecurityController extends Controller
{
    
    public function moredetails($id,$pid,$type)
    {
        $process_item = Process_Item::find($pid);
        if($type==0){
            $audit = $process_item->audits()->find($id);
        }else{
            switch($process_item->form_type_id){
                case 4:
                    $crime = Crime_report::find($process_item->form_id);
                    $audit = $crime->audits()->find($id);
                    break;
            }
        }
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
        switch($process_item->form_type_id){
            case 4:
                $crime = Crime_report::find($process_item->form_id);
                $Form_Audits = $crime->audits()->get();
                break;
        }
        return view('Security::mainview', [
            'Audits' => $Audits,
            'process_item' => $process_item,
            'Form_Audits' =>$Form_Audits,
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



}
