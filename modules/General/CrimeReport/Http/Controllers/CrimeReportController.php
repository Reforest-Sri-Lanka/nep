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
        $Process_item->activity_user_id = "0";
        $Process_item->form_id =  $id;
        $Process_item->form_type_id = "4";
        if ($crime_type == 1 ){
            $Process_item->requst_organization = "2";
        }
        else if ($crime_type == 2 ){
            $Process_item->requst_organization = "3";
        }
        else{
            $Process_item->requst_organization = "3";
        }
        
        $Process_item->status_id = "1";
        $Process_item->remark = "to be made yet";
        $Process_item->save();

        return back()->with('message', 'Crime report logged Successfully'); 
    }

  
    public function crime_module_access_controller()                  //show all records for index
    {
        $role = Auth::user()->role_id;

        if ($role == 1 || $role == 2) {         //Admin  
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
