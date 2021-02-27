<?php

namespace ApprovalItem\Http\Controllers;
use App\Models\User;
use App\Models\Organization;
use App\Models\Crime_report;
use App\Models\tree_removal_request;
use App\Models\Development_Project;
use App\Models\Process_Item;
use App\Models\land_parcel;
use App\Models\Environment_Restoration_Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;


class ApprovalItemController extends Controller
{
    public function home()
    {
        $name = 'Yashod';
        return view('approvalItem::home', compact('name'));
    }

    
    public function confirm_assign_staff($id,$pid)
    {
        $Process_item =Process_item::find($pid);
        if($Process_item->activity_user_id != null){
            return back()->with('warning', 'Authority already assigned!');
        }
        $item = Process_item::where('id',$pid)->update(['activity_user_id' => $id]);
        return back()->with('message', 'Authority assigned Successfully'); 
    }

    public function change_assign_organization($id,$pid)
    {
        $Process_item =Process_item::find($pid);
        $item = Process_item::where('id',$pid)->update(['activity_organization' => $id]);
        return back()->with('message', 'Assigned Organization Successfully'); 
    }

    public function showRequests()
    {
        $items = Process_Item::where('created_by_user_id', '=', Auth::user()->id)->get();
        return view('approvalItem::requests', [
            'items' => $items,
        ]);
    }

    public function choose_assign_staff($id)
    {
        $organization=Auth::user()->organization_id;
        $Process_item =Process_item::find($id);
        $Prerequisites=Process_item::all()->where('id',$Process_item->id);
        $Organizations=Organization::all()->where('type_id','2');
        if(Auth::user()->role_id=='3'){
            $Users = User::where([
                ['role_id', '>' , 3],           
                ['organization_id', '=', $organization], 
            ])->get();
        }
        else{
            $Users = User::where([
                ['role_id', '=' , 5],           
                ['organization_id', '=', $organization], 
            ])->get();
        }         

        
        if($Process_item->form_type_id == '1'){
            $treecut = Tree_Removal_Request::find($Process_item->form_id);
            $land_parcel = Land_Parcel::find($treecut->land_parcel_id);
            
            return view('approvalItem::assignStaff',[
                'treecut' => $treecut,
                'Users' => $Users,
                'Prerequisites' => $Prerequisites,
                'Process_item' =>$Process_item,
                'Organizations' => $Organizations,
                'polygon' => $land_parcel->polygon,
            ]);
        }
        else if($Process_item->form_type_id == '2'){
            $devp = Development_Project::find($Process_item->form_id);
            $land_parcel = Land_Parcel::find($devp->land_parcel_id);
            return view('approvalItem::assignStaff',[
                'devp' => $devp,
                'Users' => $Users,
                'Prerequisites' => $Prerequisites,
                'Process_item' =>$Process_item,
                'Organizations' => $Organizations,
                'polygon' => $land_parcel->polygon,
            ]);
        }
        else if($Process_item->form_type_id == '3'){
            $envrest = Environment_Restoration::find($Process_item->form_id);
            $land_parcel = Land_Parcel::find($envrest->land_parcel_id);
            return view('approvalItem::assignStaff',[
                'envrest' => $envrest,
                'Users' => $Users,
                'Prerequisites' => $Prerequisites,
                'Process_item' =>$Process_item,
                'Organizations' => $Organizations,
                'polygon' => $land_parcel->polygon,
            ]);
        }
        else if($Process_item->form_type_id == '4'){
            $crime = Crime_report::find($Process_item->form_id);
            $land_parcel = Land_Parcel::find($crime->land_parcel_id);
            return view('approvalItem::assignStaff',[
                'crime' => $crime,
                'Prerequisites' => $Prerequisites,
                'Users' => $Users,
                'Process_item' =>$Process_item,
                'Organizations' => $Organizations,
                'polygon' => $land_parcel->polygon,
            ]);
        } 
    }

    public function citizen_view_progress($id)
    {
        $Process_item =Process_item::find($id);
        $progress=Process_item_progress::all()->where('process_item_id',$id);
        if($Process_item->form_type_id == '1'){
            $treecut = Tree_Removal_Request::find($Process_item->form_id);
            return view('approvalItem::treeview',[
                'treecut' => $treecut,
                'progress' => $progress,
            ]);
        }
        else if($Process_item->form_type_id == '2'){
            $devp = Development_Project::find($Process_item->form_id);
            return view('approvalItem::developview',[
                'devp' => $devp,
                'progress' => $progress,
            ]);
        }
        else if($Process_item->form_type_id == '3'){
            $envrest = Environment_Restoration::find($Process_item->form_id);
            return view('approvalItem::envrestoreAssign',[
                'envrest' => $envrest,
                'progress' => $progress,
            ]);
        }
        else if($Process_item->form_type_id == '4'){
            $crime = Crime_report::find($Process_item->form_id);
            return view('approvalItem::crimeview',[
                'crime' => $crime,
                'progress' => $progress,
            ]);
        } 
    }

    public function choose_assign_organization($id)
    {
        $process_item =Process_item::find($id);
        $Organizations=Organization::all();
        if($process_item->form_type_id == '1'){ 
            $treecut = Tree_Removal_Request::find($process_item->form_id);
            $land_parcel = Land_Parcel::find($treecut->land_parcel_id);
            return view('approvalItem::assignOrg',[
                'treecut' => $treecut,
                'Organizations' => $Organizations,
                'process_item' =>$process_item,
                'polygon' => $land_parcel->polygon,
            ]);
        } 
        else if($process_item->form_type_id == '2'){
            $devp = Development_Project::find($process_item->form_id);
            $land_parcel = Land_Parcel::find($devp->land_parcel_id);
            return view('approvalItem::assignOrg',[
                'devp' => $devp,
                'Organizations' => $Organizations,
                'process_item' =>$process_item,
                'polygon' => $land_parcel->polygon,
            ]);
        }
        else if($process_item->form_type_id == '3'){
            $reforest = Environment_Restoration_Activity::find($process_item->form_id);
            return view('approvalItem::assignOrg',[
                'reforest' => $reforest,
                'Organizations' => $Organizations,
                'process_item' =>$process_item,
            ]);
        }
        else if($process_item->form_type_id == '4'){
            $crime = Crime_report::find($process_item->form_id);
            $Photos=Json_decode($crime->photos);
            $land_parcel = Land_Parcel::find($crime->land_parcel_id);
            return view('approvalItem::assignOrg',[
                'crime' => $crime,
                'process_item' =>$process_item,
                'Organizations' => $Organizations,
                'polygon' => $land_parcel->polygon,
                'Photos' => $Photos,
            ]);
        } 
    }
    public function create_prerequisite(Request $request)
    {
        
        $request -> validate([
            'organization' => 'required|not_in:0',
            'request' => 'required',
        ]);
        $id=$request['process_id'];
        $Process_item_old =Process_item::find($id);
        $Process_item_old->update([
            'prerequisite' => "1",
        ]);
        $Process_item =new Process_item;
        $Process_item->Created_by_user_id = $request['create_by'];
        $Process_item->requst_organization = $request['create_organization'];
        $Process_item->activity_organization = $request['organization'];
        $Process_item->form_id = $Process_item_old['form_id'];
        $Process_item->form_type_id = $Process_item_old['form_type_id'];  
        $Process_item->status_id = "1";
        $Process_item->prerequsite_id  = $Process_item_old['id'];
        $Process_item->remark = $request['request'];
        $Process_item->save();
        return back()->with('message', 'Prerequisite logged Successfully');  
    }
}