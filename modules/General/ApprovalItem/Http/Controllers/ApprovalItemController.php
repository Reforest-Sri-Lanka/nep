<?php

namespace ApprovalItem\Http\Controllers;

use App\Models\Process_Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApprovalItemController extends Controller
{
    public function home()
    {
        $name = 'Yashod';
        return view('approvalItem::home', compact('name'));
    }

    public function showRequests()
    {
        //$items = Process_Item::where('created_by_user_id', '=', Auth::user()->id)->get();
        $items = Process_Item::where('created_by_user_id', '=', Auth::user()->id)
            ->distinct('created_at')
            ->orderBy('created_at', 'asc')
            ->get();

            //ddd($items);

            //$users = Process_Item::where('created_by_user_id', '=', Auth::user()->id)->distinct()->get();
            //ddd($users);

        //$items = $items->distinct('created_at');
        return view('approvalItem::requests', [
            'items' => $items,
        ]);
    }
}
