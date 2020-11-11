<?php

namespace Admin\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin::adminHome', compact('users'));
    }

    public function create()
    {
        return view('admin::create');
    }

    public function more($id)
    {
        $user = User::find($id);
        return view('admin::more', compact('user'));
    }

    public function edit($id)
    {
        dd($id);
        $user = User::find($id);
        return view('admin::edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)      //to update the data via edit
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'designation' => $request->designation,
            'organization' => $request->organization,
        ]);
        return redirect('/admin/index')->with('message', 'User Updated Successfully');
    }

    public function destroy($id)            //to delete a record
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/index')->with('message', 'User Successfully Deleted');
    }

}
