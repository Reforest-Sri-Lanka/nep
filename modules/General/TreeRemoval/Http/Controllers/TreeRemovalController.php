<?php

namespace TreeRemoval\Http\Controllers;

use Illuminate\Http\Request;

class TreeRemovalController extends Controller
{
    public function home()
    {
        $name = 'Yashod';
        return view('treeRemoval::home', compact('name'));
    }
}
