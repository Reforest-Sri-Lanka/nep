<?php
namespace App\CustomClass;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\Process_Item;
use App\Models\User;
use App\Models\Organization_Activity;
use Illuminate\Support\Facades\Notification;
Use App\Notifications\AssignOrg;
Use App\Notifications\ApplicationMade;

class organization_assign
{
    public static function  auto_assign($P_id, $District , $Province)
    {
      //retrieve process item record
      $Process_Item = Process_Item::find($P_id);
      //retrieve the organization that handle the form type in the district
      $activity_org = Organization_Activity::where('district_id',$District)->where('form_type_id',$Process_Item->form_type_id)->first();
      if($activity_org != null){
        //assign process item to organization
        $Process_Item->activity_organization = $activity_org->organization_id;
        //Check admin access and decide on allowing admin review
        if($activity_org->admin_access == 0){
          $Process_Item->status_id=2;  //No admin review
        }else{
          $Process_Item->status_id=9; //allow admin review
        }
        
      }
      else{
        //If no such organization for the district then search for province
        $activity_org2 = Organization_Activity::where('province_id',$Province)->where('form_type_id',$Process_Item->form_type_id)->first();
        if($activity_org2 != null){
          $Process_Item->activity_organization = $activity_org2->organization_id;
          //Check admin access and decide on allowing admin review
          if($activity_org2->admin_access == 0){
            $Process_Item->status_id=2;
          }else{
            $Process_Item->status_id=9;
          }
        }
        else{
            //if no organization for province search for all island
            $activity_org3 = Organization_Activity::where('district_id',26)->where('form_type_id',$Process_Item->form_type_id)->first(); //checking for all island
          if($activity_org3 != null){
            $Process_Item->activity_organization = $activity_org3->organization_id;
            //Check admin access and decide on allowing admin review
            if($activity_org3->admin_access == 0){
              $Process_Item->status_id=2;
            }else{
              $Process_Item->status_id=9;
            }
          }
          else{
            //if no organization at all assign the default organization.
            $Process_Item->activity_organization=2;
          }
        }
      }
      //save and reload the process item
      $Process_Item->save();
      $Process_Itemnew = Process_Item::find($P_id);
      //retrieve the ids of admins and managers(includes HOO) of the assigned org
      $Admins = User::where('organization_id',$Process_Item->activity_organization)->whereBetween('role_id', [1, 2])->get();
      $Managers = User::where('organization_id',$Process_Item->activity_organization)->whereBetween('role_id', [3, 4])->get();
      if($Process_Itemnew->status_id ==2){
        //Notify only managers since no admin review
        Notification::send($Managers, new AssignOrg($Process_Itemnew));
      }else if($Process_Itemnew->status_id == 9){
        //Notify both admins and managers since admin review is allowed
        Notification::send($Managers, new AssignOrg($Process_Itemnew));
        Notification::send($Admins, new ApplicationMade($Process_Itemnew));
      }else{
        //default organization is set thus notify only admins of the default organization.
        Notification::send($Admins, new ApplicationMade($Process_Itemnew));
      }
      //return the assigned organization id
      return $Process_Item->activity_organization;
    }
}