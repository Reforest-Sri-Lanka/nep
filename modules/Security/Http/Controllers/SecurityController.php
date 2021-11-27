<?php

namespace Security\Http\Controllers;

use App\Models\User;
use App\Models\Process_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Crime_report;
use App\Models\Tree_Removal_Request;
use App\Models\Development_Project;
use App\Models\Environment_Restoration;
use App\Models\Land_Parcel;

class SecurityController extends Controller
{
    
    public function moredetails($id,$pid,$type)
    {
        $process_item = Process_Item::find($pid);
        if($type==0){
            $audit = $process_item->audits()->find($id);
        }else{
            switch($process_item->form_type_id){
                case 1:
                    $item = Tree_Removal_Request::find($process_item->form_id);
                    break;
                case 1:
                    $item = Development_Project::find($process_item->form_id);
                    break;
                case 3:
                    $item = Environment_Restoration::find($process_item->form_id);
                    break;
                case 4:
                    $item = Crime_report::find($process_item->form_id);
                    break;
                case 5:
                    $item = Land_Parcel::find($process_item->form_id);
                    break;
            }
            $audit = $item->audits()->find($id);
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
        //dd($process_item->form_type_id);
        switch($process_item->form_type_id){
            case 1:
                $item = Tree_Removal_Request::find($process_item->form_id);
                break;
            case 2:
                $item = Development_Project::find($process_item->form_id);
                break;
            case 3:
                $item = Environment_Restoration::find($process_item->form_id);
                break;
            case 4:
                $item = Crime_report::find($process_item->form_id);
                break;
            case 5:
                $item = Land_Parcel::find($process_item->form_id);
                break;
        }
        if(isset($item)){
        $Form_Audits = $item->audits()->get();
        return view('Security::mainview', [
            'Audits' => $Audits,
            'process_item' => $process_item,
            'Form_Audits' =>$Form_Audits,
        ]);

        }
        return false; // return a data not found page
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
