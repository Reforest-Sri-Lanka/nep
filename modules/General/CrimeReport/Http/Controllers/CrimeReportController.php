<?php

namespace CrimeReport\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Crime_report;
use App\Models\User;
use App\Models\Process_item;
use App\Models\Organization;
use App\Models\tree_removal_request;

class CrimeReportController extends Controller
{

    

    public function crime_report_form_display() {
        $Organizations = Organization::all();
        return view('crimeReport::logComplaint',['Organizations' => $Organizations],);
    }

     public function assign_authorities_crimereport(Request $request)
    {
        $request -> validate([
            'organization' => 'required|not_in:0',
            'create_by' => 'required',
            'authority_id' => 'required',
            'crimeid' => 'required',
            'comment'=>'required',
        ]);
        $id=$request['crimeid'];
        $type="4";
        $Crime = Crime_report::where('id',$id)->update(['status' => '1']);
        $Process_item = Process_item::where('form_id',$id)->where('form_type',$id)->update(['status' => '1']);
        $Process_item->Created_by_user_id = $request['create_by'];
        $Process_item->activity_organization = $request['organization'];
        $Process_item->activity_user_id = $request['authority_id'];
        $Process_item->prerequisite = "4";
        $Process_item->prerequsite_id = $request['crimeid'];
        $Process_item->requst_organization = "0";
        $Process_item->status = "0";
        $Process_item->remark = $request['comment'];
        $Process_item->save();
        return redirect('/crime-report/crimehome')->with('message', 'Authority assigned Successfully');  
    }
    
    public function load_crimeAssign($id) 
    { 
        $Process_item =Process_item::find($id);
        if($Process_item->form_type == '4'){
            $crime = Crime_report::find($Process_item->form_id);
        }
        $Users =User::all()->where('role',1);
        return view('crimeReport::crimeAssign',['crime' => $crime],['Users' => $Users],);
    }

    public function load_crimeInvestigate($id) 
    {       
        $crime = Crime_report::find($id);
        $Users =User::all()->where('role',1);
        return view('crimeReport::crimeInvestigate',['crime' => $crime],['Users' => $Users],);
    }


    public function track_user_crime_reports(Request $request)
    {
        $id=$request['create_by'];
        $Crimes = Crime_report::all()->where('created_by_user_id',$id)->toArray();
        return view('crimeReport::trackCrime',compact('Crimes'));
    }

    public function track_assigned_process_items(Request $request)
    {
        $id = Auth::user()->id;
        $Process_items = Process_item::all()->where('activity_user_id',$id)->toArray();
        return view('crimeReport::managerlist',compact('Process_items'));
    }

    public function display_all_new_process_items()
    {

        $Process_Items = Process_item::all()->where('status',0)->toArray();
        return view('crimeReport::crimeAhome',compact('Process_Items'));
    }



    public function create_crime_report(Request $request)
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
        $Crime_report->photos = "{}";
        $Crime_report->logs = "{}";
        $Crime_report->action_taken = "0";
        $Crime_report->land_parcel_id = "1"; //add relationship later
        $Crime_report->status = "0";
        $Crime_report->save();
        $id = Crime_report::max('id');
        $crime_type =$request['crime_type'];
        $Process_item =new Process_item;
        $Process_item->Created_by_user_id = $request['create_by'];
        $Process_item->requst_organization = $request['organization'];
        $Process_item->activity_organization = "0";
        $Process_item->activity_organization = "0";
        $Process_item->activity_user_id = "0";
        $Process_item->form_id =  $id;
        $Process_item->form_type_id = "4";      
        $Process_item->status_id = "1";
        $Process_item->remark = "to be made yet";
        $Process_item->save();

        return back()->with('message', 'Crime report logged Successfully'); 
        }     
        $Process_item->status_id = "1";
        $Process_item->remark = "to be made yet";
        $Process_item->save();
        return redirect('/crime-report/crimehome')->with('message', 'Crime report logged Successfully'); 
    }

    public function search_specific_authorities(Request $request)
    {
        $request -> validate([
            'organization1' => 'required|not_in:0',
            'role' => 'required|not_in:0',
        ]);

        $id=$request['crimeid'];
        $Users = User::all()->where('organization_id',$request['organization1'])->where('role_id',$request['role']);
        $crime = Crime_report::find($id);
        return view('crimeReport::crimeAssign',['crime' => $crime],['Users'=>$Users,
        ]);     
    }

  
    public function crime_module_access_controller()                  //show all records for index
    {
        $role = Auth::user()->role_id;

        if ($role == 1 || $role == 2) {         //Admin and super admin  
            $users = User::where('role_id', '>' , 1)->orWhereNull('role_id',)->get();      
            return view('crimeReport::crimeAdmin', [
                'users' => $users,
            ]);
        } else if ($role == 3|| $role == 4|| $role == 5) {                //HoO  Manager and staff  
            $users = User::where('role_id', '>' , 2)->orWhereNull('role_id')->get();
            return view('crimeReport::crimeManager', [
                'users' => $users,
            ]);
        } else if ($role == 6) {            //citizen
            $users = User::where('role_id', '>' , 3)->orWhereNull('role_id')->get();
            return view('crimeReport::crimeChome', [
                'users' => $users,
            ]);
        }else if ($role == NULL){            //other
            return view('unauthorized');
        }
    }
}
