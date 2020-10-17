<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function fetchAllRoles(){
        $roles = Role::all();
        return $roles;
    }

    public function fetchARole(){
        $roles = Role::where('id',4)->get();
        return $roles;
    }
}
