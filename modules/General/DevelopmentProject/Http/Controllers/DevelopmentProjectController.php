<?php

namespace DevelopmentProject\Http\Controllers;

use Illuminate\Http\Request;

class DevelopmentProjectController extends Controller
{
    public function home()
    {
        $name = 'Yashod';
        return view('developmentProject::home', compact('name'));
    }

    public function test()
    {
        return view('developmentProject::index');
    }
}
