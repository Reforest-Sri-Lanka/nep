<?php
namespace Organization\Http\Controllers;
use App\Models\User;
use App\Models\Organization;
use App\Models\Province;
use App\Models\Organization_Activity;
use App\Models\Contact;
use App\Models\Form_Type;
use App\Models\Branch_Type;
use App\Models\Type;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class OrganizationController extends Controller {
    
    // Returns the create.blade.php view in the organization module.
    public function create() {
        $branches = Branch_Type::all();
        $list = Type::all();
        return view(('organization::create'), [
            'branches' => $branches,
            'data' => $list
        ]);  
    }

    // When the user fills in the details of the new organization and clicks submit it will be handled here. organization details and contact details will store database.
    public function store(Request $request) {
        //dd($request->all());
        $organization = new Organization();
        $organization->title = $request->title;
        $organization->city = $request->city;
        $organization->type_id = $request->org_type;
        $organization->branch_type_id = $request->branch_type;
        $organization->description = $request->description;
        $organization->status = $request->status;
        $organization->save();
        $type = $request->type;
        $contact_signature = $request->contact_signature;
        $count = count((array)$type);
        
        for ($i = 0;$i < $count;$i++) {
            $contact = new Contact();
            $contact->org_id = $organization->id;
            $contact->type = $request->type[$i];
            $contact->contact_signature = $request->contact_signature[$i];
            $contact->primary = $request->primary;
            $contact->status = $request->status;
            $contact->save();
        }
        //direct back to the index page.
        return redirect('/organization/index')->with('message', 'Organization Successfully created');
    }

    // Return the View more details window for organization.
    public function more(Request $request){ 
        $organization = Organization::find($request->id); 
        //$contact = Contact::all();   
        $contact = Contact::Where('org_id',$request->id)->get(); 
        //dd($contact);   
        //direct back to the index page.                   
        return view('organization::more', compact("organization","contact"));
    }

    
    // Returns the edit view for organization.
    public function edit($id) {
        $organization = Organization::find($id);
        $contact = Contact::Where('org_id',$id)->get(); 
        //dd($contact);  
        //direct back to the index page.
        return view('organization::edit', ['organization' => $organization, 'contact' => $contact, ]);
    }

    
    // When the admin clicks the submit button in the edit view, the following data will be
    // patched for the relavant organization who is being edited and saved in the db.
    public function update(Request $request, $id) {
        $organization = Organization::find($id);
        $organization->update([
            'title' => $request->title,
            'city' => $request->city, 
            'country' => $request->country, 
            'type_id' => $request->org_type, 
            'description' => $request->description, 
            'status' => $request->status, 
        ]);

        $contact = Contact::find($id);
        $contact->update([
            'org_id' => $organization->id, 
            'type' => $request->type, 
            'contact_signature' => $request->contact_signature, 
            'primary' => $request->primary, 
            'status' => $request->status, 
        ]);
       
        //direct back to the index page.
        return redirect('/organization/index')->with('message', 'Organization Updated Successfully');
    }

    // Routing logic
    public function index() {
        
        $organization = Organization::all();
        $contact = Contact::all();
        //direct back to the index page.
        return view('organization::index')->with('organization', $organization)->with('contact',$contact);
        
    }

    public function activities() {
        $organizations = Organization_Activity::all();
        //direct back to the index page.
        return view('organization::activity', [
            'organizations' => $organizations,
        ]);  
    }

    public function new_activity() {
        $organizations = Organization::all();
        $Forms =Form_Type::all();
        $province = Province::all();
        $district = District::all();
        //direct back to the index page.
        return view('organization::newactivity', [
            'organizations' => $organizations,
            'Forms' => $Forms,
            'provinces' => $province,
            'districts' => $district,
        ]);  
    }

    public function activity_create(Request $request) {
        $Org_act = new Organization_Activity();
        $Org_act->form_type_id = $request->form_type;
        if(request('district') != null){
            $Org_act->district_id = request('district');
        }
        if(request('province') != null){
            $Org_act->province_id = request('province');
        }
        $org_id = Organization::where('title', request('organization'))->pluck('id');
        $Org_act->organization_id = $org_id[0];
        $Org_act->save();
        return redirect('/organization/actIndex')->with('message', 'Organization Successfully assigned to handle application');
    }
    public function activity_remove($id) {
        $organization = Organization_Activity::find($id);
        $organization->delete();
        return redirect('/organization/actIndex')->with('message', 'Organization Successfully removed from handling application');
    }

    public function destroy($id) {
        $organization = Organization::find($id);
        $organization->delete();
        return redirect('/organization/index')->with('message', 'Organization Successfully Deleted');
    }
}