<?php

namespace ApprovalItem\Http\Controllers;

use App\Models\User;
use App\Models\Crime_report;
use App\Models\tree_removal_request;
use App\Models\Development_Project;
use App\Models\Process_Item;
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


    public function confirm_assign_staff($id, $pid)
    {
        $Process_item = Process_item::find($pid);
        $item = Process_item::where('id', $pid)->update(['activity_user_id' => $id]);
        return back()->with('message', 'Authority assigned Successfully');
    }


//Gets all the requests made by a particular user from the process items tables and dsiplays them
//Filters out requests created at the same time. Sometmes we create multiple requests for multiple organizations.
    public function showRequests()  
    {
        $items = Process_Item::where('created_by_user_id', '=', Auth::user()->id)->get();
        
        // 1
        // $data = $items->validate([
        //     'form_id' => 'unique:process_items,form_type_id',
        //     'form_type_id' => 'unique:process_items,form_id',
        // ]);

        // 2
        // $this->validate($items, [
        //     'form_id' => 'unique:process_items,form_type_id',
        //     'form_type_id' => 'unique:process_items,form_id',
        // ]);

        $data = $items->unique('created_at');
        return view('approvalItem::requests', [
            'items' => $data,
        ]);
    }

    public function choose_assign_staff($id)
    {
        $organization = Auth::user()->organization_id;
        $Process_item = Process_item::find($id);
        $Prerequisites = Process_item::all()->where('id', $Process_item->prerequsite_id);


        if (Auth::user()->role_id == '3') {
            $Users = User::where([
                ['role_id', '>', 3],
                ['organization_id', '=', $organization],
            ])->get();
        } else {
            $Users = User::where([
                ['role_id', '=', 5],
                ['organization_id', '=', $organization],
            ])->get();
        }

        if ($Process_item->form_type_id == '1') {
            $treecut = Tree_Removal_Request::find($Process_item->form_id);
            return view('approvalItem::treeAssign', [
                'treecut' => $treecut,
                'Users' => $Users,
                'Prerequisites' => $Prerequisites,
                'Process_item' => $Process_item,
            ]);
        } else if ($Process_item->form_type_id == '2') {
            $devp = Development_Project::find($Process_item->form_id);
            return view('approvalItem::developAssign', [
                'devp' => $devp,
                'Users' => $Users,
                'Prerequisites' => $Prerequisites,
                'Process_item' => $Process_item,
            ]);
        } else if ($Process_item->form_type_id == '4') {
            $crime = Crime_report::find($Process_item->form_id);
            return view('approvalItem::crimeAssign', [
                'crime' => $crime,
                'Prerequisites' => $Prerequisites,
                'Users' => $Users,
                'Process_item' => $Process_item,
            ]);
        }
    }

    public function citizen_view_progress($id)
    {
        $Process_item = Process_item::find($id);
        $progress = Process_item_progress::all()->where('process_item_id', $id);
        if ($Process_item->form_type_id == '1') {
            $treecut = Tree_Removal_Request::find($Process_item->form_id);
            return view('approvalItem::treeview', [
                'treecut' => $treecut,
                'progress' => $progress,
            ]);
        } else if ($Process_item->form_type_id == '2') {
            $devp = Development_Project::find($Process_item->form_id);
            return view('approvalItem::developview', [
                'devp' => $devp,
                'progress' => $progress,
            ]);
        } else if ($Process_item->form_type_id == '4') {
            $crime = Crime_report::find($Process_item->form_id);
            return view('approvalItem::crimeview', [
                'crime' => $crime,
                'progress' => $progress,
            ]);
        }
    }
}
