<?php
namespace Organization\Http\Controllers;
use App\Models\User;
use App\Models\Organization;
use App\Models\Type;


class TypeController extends Controller{

    //Get contact types from database.
    public function getTypesList() {
       
        $list = Type::all();
        return view('organization::create')->with('data', $list);
    }

}