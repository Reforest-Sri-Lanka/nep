<?php
namespace App\CustomClass;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\Process_Item;
use App\Models\Organization_Activity;

class organization_assign
{
    public static function  auto_assign($P_id, $District , $Province)
    {
      $Process_Item = Process_Item::find($P_id);
        $activity_org = Organization_Activity::where('district_id',$District)->where('form_type_id',$Process_Item->form_type_id)->first();
      if($activity_org != null){
        $Process_Item->activity_organization = $activity_org->organization_id;
        if($activity_org->admin_access == 0){
          $Process_Item->status_id=2;
        }else{
          $Process_Item->status_id=9;
        }
        
      }
      else{
        $activity_org2 = Organization_Activity::where('province_id',$Province)->where('form_type_id',$Process_Item->form_type_id)->first();
        if($activity_org2 != null){
          $Process_Item->activity_organization = $activity_org2->organization_id;
          if($activity_org2->admin_access == 0){
            $Process_Item->status_id=2;
          }else{
            $Process_Item->status_id=9;
          }
        }
        else{
            $activity_org3 = Organization_Activity::where('district_id',26)->where('form_type_id',$Process_Item->form_type_id)->first(); //checking for all island
          if($activity_org3 != null){
            $Process_Item->activity_organization = $activity_org3->organization_id;
            if($activity_org3->admin_access == 0){
              $Process_Item->status_id=2;
            }else{
              $Process_Item->status_id=9;
            }
          }
          else{
            $Process_Item->activity_organization=2;
          }
        }
      }
      $Process_Item->save();
      $Process_Itemnew = Process_Item::find($P_id);
      $Users = User::where([
        ['role_id', '=', 3],
        ['organization_id', '=', $Process_Item->activity_organization],
      ])->orWhere([
          ['role_id', '=', 4],
          ['organization_id', '=', $Process_Item->activity_organization],
      ])->get();
      if($Process_Itemnew->status_id==2){
        Notification::send($Users, new AssignOrg($Process_Itemnew));
      }else{
        Notification::send($Users, new ApplicationMade($Process_Itemnew));
      }
      return $Process_Item->activity_organization;
    }
}