<?php
namespace App\CustomClass;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Process_Item;
use App\Models\Land_Parcel;
use App\Models\Land_Has_Gazette;
use App\Models\Land_Has_Organization;


class lanparcel_creation
{
    public static function  land_save($request)
    {
        $land = new Land_Parcel();
        $land->title = $request->planNo;
        if (($request->surveyorName)!= null) {
            $land->surveyor_name = $request->surveyorName;
        } else {
            $land->surveyor_name = "No surveyor given";
        }
        
        $land->district_id = $request->district;
        if (request('province')) {
        $land->province_id = $request->province;
        }
        if (request('gs_division')) {
        $land->gs_division_id = $request->gs_division;
        }

        //$land->governing_organizations = request('governing_orgs');
        if (($request->governing_orgs)!= null) {
            $land->governing_organizations = request('governing_orgs');
        } else {
            $land->governing_organizations = [];
        }
        $land->polygon = request('polygon');
        $land->created_by_user_id = request('createdBy');
        if (request('isProtected')) {
            $land->protected_area = request('isProtected');
        }else {
            $land->protected_area = 0;
        }
        if (request('land_extent')) {
            $land->size = request('size');
        }
        if (request('land_extent_unit')) {
            $land->size_unit = request('size_unit');
        }
        $land->status_id = 1;
        $land->save();
        $landid = Land_Parcel::latest()->first()->id;
        if (request('governing_orgs')) {
            $governing_organizations = request('governing_orgs');

            foreach ($governing_organizations as $governing_organization) {
                $land_has_organization = new Land_Has_Organization();
                $land_has_organization->land_parcel_id = $landid;
                $land_has_organization->organization_id = $governing_organization;
                $land_has_organization->status = 1;
                $land_has_organization->save();
            }
        }

        if (request('gazettes')) {

          $gazettes = request('gazettes');

          foreach ($gazettes as $gazette) {
              $land_has_gazette = new Land_Has_Gazette();
              $land_has_gazette->land_parcel_id = $landid;
              $land_has_gazette->gazette_id = $gazette;
              $land_has_gazette->status = 1;
              $land_has_gazette->save();
        }
      }
        return $landid;
    }

    public static function  landprocesses_save($request,$landid,$pid){
        if (request('governing_orgs')) {
            $governing_organizations = request('governing_orgs');

            foreach ($governing_organizations as $governing_organization) {
                $process = new Process_Item();
                $process->form_type_id = 5;
                $process->form_id = $landid;
                $process->created_by_user_id = request('createdBy');
                $process->request_organization = Auth::user()->organization_id;
                $process->activity_organization = $governing_organization;
                $process->prerequisite_id = $pid; 
                $process->prerequisite = 1;  
                $process->save();
            }
        }
    }

    public static function  landorg_update($request,$pid){
        
        if (request('governing_orgs')) {
            $governing_organizations = Land_Has_Organization::where('land_parcel_id',$request->lid)->pluck('organization_id')->toArray();
            $new_governing_organizations=array_diff($request->governing_orgs,$governing_organizations);
            $land_org=Land_Has_Organization::where('land_parcel_id',$request->lid)->whereNotIn('organization_id',$request->governing_orgs)->get();
            foreach ($new_governing_organizations as $governing_organization) {
                $land_has_organization = new Land_Has_Organization();
                $land_has_organization->land_parcel_id = $request->lid;
                $land_has_organization->organization_id = $governing_organization;
                $land_has_organization->status = 1;
                $land_has_organization->save();

                $process = new Process_Item();
                $process->form_type_id = 5;
                $process->form_id = $request->lid;
                $process->created_by_user_id = request('createdBy');
                $process->request_organization = Auth::user()->organization_id;
                $process->activity_organization = $governing_organization;
                $process->prerequisite_id = $pid; 
                $process->prerequisite = 1;  
                $process->save();
            }
        }else{
            $land_org=Land_Has_Organization::where('land_parcel_id',$request->lid)->get();
        }
        foreach ($land_org as $governing_org){
            $governing_org->delete();
        }
        if (request('gazettes')) {
            $all_gazettes = Land_Has_Gazette::where('land_parcel_id',$request->lid)->pluck('gazette_id')->toArray();
            $new_gazettes=array_diff($request->gazettes,$all_gazettes);
            $old_gazettes=Land_Has_Gazette::where('land_parcel_id',$request->lid)->whereNotIn('gazette_id',$request->gazettes)->get();
            foreach ($new_gazettes as $gazette) {
                $land_has_gazette = new Land_Has_Gazette();
                $land_has_gazette->land_parcel_id = $request->lid;
                $land_has_gazette->gazette_id = $gazette;
                $land_has_gazette->status = 1;
                $land_has_gazette->save();
            }
        }else{
            $old_gazettes=Land_Has_Gazette::where('land_parcel_id',$request->lid)->get();
        }
        foreach ($old_gazettes as $old_gazette){
            $old_gazette->delete();
        }

    }

    public static function  land_update($request)
    {
        $land =Land_Parcel::find($request->lid);
        $land->title = $request->planNo;
        if (($request->surveyorName)!= null) {
            $land->surveyor_name = $request->surveyorName;
        } else {
            $land->surveyor_name = "No surveyor given";
        }
        $land->district_id = $request->district;
        if (request('province')) {
            $land->province_id = $request->province;
        }
        if (request('gs_division')) {
            $land->gs_division_id = $request->gs_division;
        }
        $land->polygon = $request->polygon;
        if (request('land_extent')) {
            $land->size = request('size');
        }
        if (request('land_extent_unit')) {
            $land->size_unit = request('size_unit');
        }
        $land->update();
    }
}