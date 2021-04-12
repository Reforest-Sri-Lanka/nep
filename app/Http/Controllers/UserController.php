<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        $tree_removals = Process_Item::where('form_type_id',1)
        ->whereMonth('created_at', Carbon::now()->month)
        ->count(); 
        $dev_projects = Process_Item::where('form_type_id',2)
        ->whereMonth('created_at', Carbon::now()->month)
        ->count(); 
        return view('Unauthorized', [
            'tree_removals' =>$tree_removals,
            'dev_projects'=>$dev_projects
        ]);
    }
}
