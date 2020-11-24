<?php

namespace Organization\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{

   // The more details view for all the organization will be the same. So one view is being used with one function to display that view.
    public function more($id)
    {
        $organization = Organization::find($id);
        return view('organization::more', compact('organization'));
    }

    // Returns the create.blade.php view in the admin module.
    public function create()
    {
        return view('organization::create');
    }

    // When the user fills in the details of the new organization and clicks submit it will be handled here

    public function store(Request $request)
    {

        $organization = new Organization();
        $organization->title = $request->title;
        $organization->city = $request->city;
        $organization->type = $request->org_type;
        $organization->description = $request->description;
        $organization->status = $request->status;
        $organization->save();
        
        $contact = new Contact();
        $contact->org_id = $organization->id;
        $contact->type = $request->type;
        $contact->contact_signature = $request->contact_signature[0];
        $contact->primary = $request->primary;
        $contact->status = $request->status;
        $contact->save();

        return redirect('/organization/index')->with('message', 'Organization Successfully created');
   }
   

    // Returns the edit view for organization.
    public function edit($id)
    {

        $organization = Organization::find($id);
        return view('organization::edit', [
            'organization' => $organization,
        ]);
    }

    // When the admin clicks the submit button in the edit view, the following data will be 
    // patched for the relavant organization who is being edited and saved in the db.
    public function update(Request $request, $id)     
    {

       $organization = Organization::find($id);
        $organization->update([
            
            'title' => $request->title,
            'city' => $request->city,
            'country' => $request->country,
            'type' => $request->type,
            'description' => $request->description,
            'status' => $request->status,

        ]);
        //direct back to the index page.
        return redirect('/organization/index')->with('message', 'Organization Updated Successfully'); 


    }

    // Routing logic
    public function index()
    {
        $organization = Organization::all();
        return view('organization::index') -> with('organization',$organization);
    }

    public function destroy($id)     
    {
        $organization = Organization::find($id);
        $organization->delete();
        return redirect('/organization/index')->with('message', 'Organization Successfully Deleted');
    }


}