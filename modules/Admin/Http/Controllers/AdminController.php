<?php

namespace Admin\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $name = 'Yashod';
        return view('admin::home', compact('name'));
    }
}
