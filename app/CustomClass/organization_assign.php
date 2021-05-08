<?php
namespace App\CustomClass;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\Process_Item;
use App\Models\Organization_Activity;

class organization_assign
{
    public static function  auto_assign($P_id, $District)
    {
      $Process_Item = Process_Item::find($P_id);
        $activity_org = Organization_Activity::where('district_id',$District)->where('form_type_id',$Process_Item->form_type_id)->first();;
      if($activity_org != null){
        $Process_Item->activity_organization = $activity_org->organization_id;
        $Process_Item->status_id=2;
      }
      else{
        $Process_Item->activity_organization=1;
      }
      $Process_Item->save();
      //dd($Process_Item,$activity_org,$District);
    }
}