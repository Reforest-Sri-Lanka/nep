<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Crime_report;
use App\Models\User;
use App\Models\Process_item;
use App\Models\tree_removal_request;
class Crime_reportController extends Controller
{
    //
    public function index()
    {
    
        $Crime_report = new Crime_report;

    }
//
    public function crimehome()
    {
    
        $Check = "{{ Auth::user()->role }}";
        if ($Check=='5'){
            return view('general.crimeChome');
        }
        else{
            return view('welcome');
        }
        

    }

    public function assignauth(Request $request)
    {
        $request -> validate([
            'organization' => 'required|not_in:0',
            'create_by' => 'required',
            'authority_id' => 'required',
            'crimeid' => 'required',
            'comment'=>'required',
        ]);
        $id=$request['crimeid'];
        $Crime = Crime_report::where('id',$id)->update(['status' => '1']);
        $Process_item =new Process_item;
        $Process_item->Created_by_user_id = $request['create_by'];
        $Process_item->activity_organization = $request['organization'];
        $Process_item->activity_user_id = $request['authority_id'];
        $Process_item->prerequisite = "4";
        $Process_item->prerequsite_id = $request['crimeid'];
        $Process_item->requst_organization = "0";
        $Process_item->status = "0";
        $Process_item->remark = $request['comment'];
        $Process_item->save();
        return redirect('/crimehome')->with('message', 'Authority assigned Successfully');
        
    }
    public function show($id) {
        
        $Process_item =Process_item::find($id);
        if($Process_item->form_type == '4'){
            $crime = Crime_report::find($Process_item->form_id);
        }

        
        
        $Users =User::all()->where('role',1);
        return view('general.crimeAssign',['crime' => $crime],['Users' => $Users],);
    }

    public function show2($id) {
        
        $crime = Crime_report::find($id);
        $Users =User::all()->where('role',1);
        return view('general.crimeInvestigate',['crime' => $crime],['Users' => $Users],);
    }

    public function general()
    {
        
        //$org=Auth::user()->organization_id;
        $org=2;
        $role = Auth::user()->role_id;
        if ($role == 1 || $role == 2 || $role == NULL ){
            return view('unauthorized')->with('message', 'Admins are not allowed access to general module');
        }
        if ($role == 3 || $role == 4){
            $Process_items = Process_item::all()->where('activity_organization',$org)->toArray();
            return view('general.generalM',compact('Process_items'));
        }
        else{
            $Process_items = Process_item::all()->where('created_by_user_id',$id)->toArray();
            return view('general.generalM',compact('Process_items'));
        }
        
    }

    public function track(Request $request)
    {
        $id=$request['create_by'];
        $Crimes = Crime_report::all()->where('created_by_user_id',$id)->toArray();
        return view('general.trackCrime',compact('Crimes'));
    }

    public function track2(Request $request)
    {
        $id = Auth::user()->id;
        $Process_items = Process_item::all()->where('activity_user_id',$id)->toArray();
        return view('general.managerlist',compact('Process_items'));
    }

    public function admin()
    {
       
        //$Crimes = Crime_report::all()->where('status',0)->toArray();
        $Process_Items = Process_item::all()->where('status',0)->toArray();
        return view('general.crimeAhome',compact('Process_Items'));
        

    }


    public function create(Request $request)
    {
            
        $request -> validate([
            'crime_type' => 'required|not_in:0',
            'description' => 'required',
            'location' => 'required',
            'confirm' => 'required',
            'create_by'=>'required',
        ]);
        
        $Crime_report = new Crime_report;
        $Crime_report->Created_by_user_id = $request['create_by'];
        $Crime_report->crime_type = $request['crime_type'];
        $Crime_report->description = $request['description'];
        $Crime_report->polygon = $request['location'];
        $Crime_report->action_taken = "0";
        $Crime_report->status = "0";
        $Crime_report->save();

        $id = Crime_report::max('id');
        $crime_type =$request['crime_type'];

        $Process_item =new Process_item;
        $Process_item->Created_by_user_id = $request['create_by'];
        $Process_item->activity_organization = "0";
        $Process_item->activity_user_id = "0";
        $Process_item->form_id =  $id;
        $Process_item->form_type = "4";
        if ($crime_type == 1 ){
            $Process_item->requst_organization = "2";
        }
        else if ($crime_type == 2 ){
            $Process_item->requst_organization = "3";
        }
        else{
            $Process_item->requst_organization = "3";
        }
        
        $Process_item->status = "0";
        $Process_item->remark = "to be made yet";
        $Process_item->save();

        return redirect('/crimehome')->with('message', 'Crime report logged Successfully');
    }

    public function create2(Request $request)
    {
            
        $request -> validate([
            'district' => 'required|not_in:0',
            'description' => 'required',
            'gs_division' => 'required',
            'confirm' => 'required',
            'create_by'=>'required',
        ]);
        
        $treecut = new  tree_removal_request;
        $treecut->Created_by_user_id = $request['create_by'];
        $treecut->district = $request['district'];
        $treecut->description = $request['description'];
        $treecut->gs_division = $request['gs_division'];
        $treecut->status = "0";
        $treecut->save();

        $id = tree_removal_request::max('id');

        $Process_item =new Process_item;
        $Process_item->Created_by_user_id = $request['create_by'];
        $Process_item->activity_organization = "0";
        $Process_item->activity_user_id = "0";
        $Process_item->form_id =  $id;
        $Process_item->form_type = "1";
        $Process_item->requst_organization = "0";
        $Process_item->status = "0";
        $Process_item->remark = "to be made yet";
        $Process_item->save();

        return redirect('/crimehome')->with('message', 'Crime report logged Successfully');
    }

    public function searchauth(Request $request){

        $request -> validate([
            'organization1' => 'required|not_in:0',
            'role' => 'required|not_in:0',
        ]);

        $id=$request['crimeid'];
        $Users = User::all()->where('organization_id',$request['organization1'])->where('role_id',$request['role']);
        $crime = Crime_report::find($id);
        return view('general.crimeAssign',['crime' => $crime],['Users'=>$Users,
        ]);
        
    }

    public function index2()                  //show all records for index
    {
        $role = Auth::user()->role_id;

        if ($role == 1 || $role == 2) {         //Admin  
            $users = User::where('role_id', '>' , 1)->orWhereNull('role_id',)->get();      
            return view('general.crimeAdmin', [
                'users' => $users,
            ]);
        } else if ($role == 3|| $role == 4|| $role == 5) {                //HoO  Manager and staff  
            $users = User::where('role_id', '>' , 2)->orWhereNull('role_id')->get();
            return view('general.crimeManager', [
                'users' => $users,
            ]);
        } else if ($role == 6) {            //citizen
            $users = User::where('role_id', '>' , 3)->orWhereNull('role_id')->get();
            return view('general.crimeChome', [
                'users' => $users,
            ]);
        }else if ($role == NULL){            //other
            return view('unauthorized');
        }
    }
}
