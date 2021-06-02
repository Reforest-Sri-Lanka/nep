<?php

namespace LandParcel\Http\Controllers;

use App\Models\Land_Parcel;
use App\Models\Province;
use App\Models\District;
use App\Models\GS_Division;
use App\Models\Organization;
use App\Models\Gazette;
use App\Models\Land_Has_Gazette;
use App\Models\Land_Has_Organization;
use App\Models\Process_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class LandController extends Controller
{
    public function form()
    {
        $gazettes = Gazette::all();
        $province = Province::all();
        $district = District::all();
        $organizations = Organization::all();
        $gs = GS_Division::orderBy('gs_division')->get();
        return view('land::form', [
            'organizations' => $organizations,
            'gazettes' => $gazettes,
            'provinces' => $province,
            'districts' => $district,
            'gs' => $gs,

        ]);
    }

    public function save(Request $request)
    {

        $request->validate([
            'planNo' => 'required',
            'surveyorName' => 'required',
            'province' => 'required',
            'district' => 'required',
            'gs_division' => 'required',
            'governing_orgs' => 'nullable',
            'gazettes' => 'nullable',
            'polygon' => 'required'
        ]);

        $land = new Land_Parcel();
        $land->title = request('planNo');
        $land->surveyor_name = request('surveyorName');
        $land->district_id = $request->district;
        $land->province_id = $request->province;
        $land->gs_division_id = $request->gs_division;

        //$land->governing_organizations = request('governing_orgs');
        if (request('governing_orgs')) {
            $land->governing_organizations = request('governing_orgs');
        } else {
            $land->governing_organizations = [];
        }
        $land->polygon = request('polygon');
        $land->created_by_user_id = request('createdBy');
        if (request('isProtected')) {
            $land->protected_area = request('isProtected');
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
                $land_has_organization->status = 2;
                $land_has_organization->save();

                $process = new Process_Item();
                $process->form_type_id = 5;
                $process->form_id = $landid;
                $process->created_by_user_id = request('createdBy');
                $process->request_organization = Auth::user()->organization_id;
                $process->activity_organization = $governing_organization;
                $process->save();
            }
        }

        if (request('gazettes')) {

            $gazettes = request('gazettes');

            foreach ($gazettes as $gazette) {
                $land_has_gazette = new Land_Has_Gazette();
                $land_has_gazette->land_parcel_id = $landid;
                $land_has_gazette->gazette_id = $gazette;
                $land_has_gazette->status = 2;
                $land_has_gazette->save();
            }
        }
        return redirect('/general/pending')->with('message', 'Request Created Successfully');
    }


    public function show($id)
    {
        $item = Process_Item::find($id);
        $land_data = Land_Parcel::find($item->form_id);
        return view('land::show', [
            'land' => $land_data,
            'polygon' => $land_data->polygon,
            'other_removal_requestor' => $item->other_removal_requestor_name,
            'process' => $item,
        ]);
    }

    public function destroy($landid)
    {

        DB::transaction(function () use ($landid) {

            $landhasGazettes = Land_Has_Gazette::where("land_parcel_id", "=", $landid)->get();
            foreach ($landhasGazettes as $landhasGazette) {
                $landhasGazette->delete();
            }

            $landHasOrganizations = Land_Has_Organization::where("land_parcel_id", "=", $landid)->get();
            foreach ($landHasOrganizations as $landHasOrganization) {
                $landHasOrganization->delete();
            }

            $landProcess = Process_Item::where([
                ["form_id", "=", $landid],
                ['form_type_id', '=', 5],
            ])->get();
            foreach ($landProcess as $land) {
                $land->delete();
            }

            $landParcel = Land_Parcel::find($landid);
            $landParcel->delete();
        });
        return redirect('/approval-item/showRequests')->with('message', 'Request Successfully Deleted');
    }

    function action(Request $request)
    {

        if ($request->hasFile('select_file')) {
            $file = $request->file('select_file');
            //you also need to keep file extension as well
            $name = $file->getClientOriginalExtension();
            if ($name == "kml") {
                $image = $request->file('select_file');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('kml'), $new_name);
                return response()->json([
                    'message'   => 'File Upload Successfull',
                    'uploaded_image' => "kml/$new_name",
                    'class_name'  => 'alert-success'
                ]);
            } else {
                return response()->json([
                    'message'   => "Error Uploading File. Check File Type.",
                    'uploaded_image' => '',
                    'class_name'  => 'alert-danger'
                ]);
            }
        }
    }
}
