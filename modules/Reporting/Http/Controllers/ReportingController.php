<?php
namespace Reporting\Http\Controllers;

use App\Models\Form_Type;
use App\Models\Organization;
use App\Models\Process_Item;
use App\Models\Province;
use App\Models\District;
use App\Models\Tree_Removal_Request;
use App\Models\Environment_Restoration;
use App\Models\Environment_Restoration_Activity;
use App\Models\Environment_Restoration_Species;
use App\Models\Ecosystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class ReportingController extends Controller {
    //OVERVIEW TAB CHARTS
    public function overview(){
        $items = Process_Item::where('activity_organization', '=', Auth::user()->organization_id)->get();
        return view('reporting::overview',['items' => $items]);
    }
    //Process Item per month Line Chart
    public function getAllProcessItems() {
        $month_year_array=array();
        $process_items_dates = Process_Item::orderBy('created_at','ASC')->pluck('created_at');
        $process_items_dates = json_decode($process_items_dates);
        if( ! empty($process_items_dates)){
            foreach($process_items_dates as $unformatted_date){
                $date = new \DateTime($unformatted_date);
                $month_no = strval($date->format('m'));
                $year_no = strval($date->format('y'));
                $month_year_no=$month_no.$year_no;
                $month_name = $date->format('M');
                $year_name = $date->format('Y');
                $month_year_name=$month_name.(" ").$year_name;
                $month_year_array[$month_year_no] = $month_year_name; //obtains as array of month and years
            }
        }
        return $month_year_array;
    }
    function getMonthlyProcessItemCount( $month ) {
        $month_val=intval(substr($month,0,2));
        $year_val=intval("20".substr($month,2));
        $monthly_process_item_count = Process_Item::whereYear('created_at',$year_val)->whereMonth( 'created_at', $month_val )->get()->count();
        return $monthly_process_item_count;
	}

	function getMonthlyProcessItemData() {

		$monthly_process_item_count_array = array();
		$month_year_array = $this->getAllProcessItems();
		$month_year_name_array = array();
		if ( ! empty( $month_year_array ) ) {
			foreach ( $month_year_array as $month_year_no => $month_year_name ){
				$monthly_process_item_count = $this->getMonthlyProcessItemCount( $month_year_no );
				array_push( $monthly_process_item_count_array, $monthly_process_item_count );
				array_push( $month_year_name_array, $month_year_name );
			}
		}

		$max_no = max( $monthly_process_item_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_process_item_data_array = array(
			'months_years' => $month_year_name_array,
			'process_item_count_data' => $monthly_process_item_count_array,
			'max' => $max,
		);

		return $monthly_process_item_data_array;

    }

    //number of forms per request bar chart
    function getProcessItemFormTypes(){
        $form_types = Form_Type::all()->pluck('type');
        $form_types_id = 1;
        $form_types = json_decode($form_types);
        $form_type_array=array();
        foreach($form_types as $form_type){
            $form_type_array[$form_types_id] = $form_type;
            $form_types_id++;
        }
        return $form_type_array;
    }

    function getProcessItemTypeCount($ftid){
        $form_type_count = Process_Item::where('form_type_id', $ftid)->count();
        return $form_type_count;
    }

    function getProcessItemFormTypeData(){
        $process_item_type_count_array = array();
        $process_item_types_array = $this->getProcessItemFormTypes();
        $process_item_type_name_array = array();
        $form_types_id =1;
		if ( ! empty( $process_item_types_array ) ) {
			foreach ( $process_item_types_array as $form_type ){
				$process_item_type_count = $this->getProcessItemTypeCount( $form_types_id );
				array_push( $process_item_type_count_array, $process_item_type_count );
				array_push( $process_item_type_name_array, $form_type );
                $form_types_id++;
			}
		}
        $max_no = max( $process_item_type_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$process_item_form_type_data_array = array(
			'form_type' => $process_item_type_name_array,
			'process_item_type_count_data' => $process_item_type_count_array,
			'max' => $max,
		);
		return $process_item_form_type_data_array;
    }


    //number of requests per assigned organization pie chart
    function getProcessItemOrganizationNames(){
        $activity_organizations = Organization::all()->pluck('title');
        $activity_organizations_id = 1;
        $activity_organizations = json_decode($activity_organizations);
        foreach($activity_organizations as $activity_organization){
            $activity_organization_type_array[$activity_organizations_id] = $activity_organization;
            $activity_organizations_id++;
        }
        return $activity_organization_type_array;
    }

    function getProcessItemOrganizationCount($oid){
        $activity_organization_count = Process_Item::where('activity_organization', $oid)->count();
        return $activity_organization_count;
    }

    function getProcessItemOrganizationData(){
        $process_item_organization_count_array = array();
        $process_organization_array = $this->getProcessItemOrganizationNames();
        $process_organization_name_array = array();
        $organization_id =1;
		if ( ! empty( $process_organization_array ) ) {
			foreach ( $process_organization_array as $activity_organization ){
				$process_item_organization_count = $this->getProcessItemOrganizationCount( $organization_id );
				array_push( $process_item_organization_count_array, $process_item_organization_count );
				array_push( $process_organization_name_array, $activity_organization );
                $organization_id++;
			}
		}
        $max_no = max( $process_item_organization_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$process_item_activity_organization_data_array = array(
			'organization_name' => $process_organization_name_array,
			'process_item_activity_organization_count_data' => $process_item_organization_count_array,
			'max' => $max,
		);
		return $process_item_activity_organization_data_array;
    }





    public function treeRemoval(){
        return view('reporting::treeRemoval');
    }
    //Tree Removals per month Line Chart
    public function getAllTreeRemovals() {
        $month_year_array=array();
        $tree_removal_dates = Tree_Removal_Request::orderBy('created_at','ASC')->pluck('created_at');
        $tree_removal_dates = json_decode($tree_removal_dates);
        if( ! empty($tree_removal_dates)){
            foreach($tree_removal_dates as $unformatted_date){
                $date = new \DateTime($unformatted_date);
                $month_no = strval($date->format('m'));
                $year_no = strval($date->format('y'));
                $month_year_no=$month_no.$year_no;
                $month_name = $date->format('M');
                $year_name = $date->format('Y');
                $month_year_name=$month_name.(" ").$year_name;
                $month_year_array[$month_year_no] = $month_year_name; //obtains as array of month and years
            }
        }
        return $month_year_array;
    }
    function getMonthlyTreeRemovalCount( $month ) {
        $month_val=intval(substr($month,0,2));
        $year_val=intval("20".substr($month,2));
        $monthly_tree_removal_count = Tree_Removal_Request::whereYear('created_at',$year_val)->whereMonth( 'created_at', $month_val )->pluck('no_of_trees')->sum();
        return $monthly_tree_removal_count;
	}

	function getMonthlyTreeRemovalData() {

		$monthly_tree_removal_count_array = array();
		$month_year_array = $this->getAllTreeRemovals();
		$month_year_name_array = array();
		if ( ! empty( $month_year_array ) ) {
			foreach ( $month_year_array as $month_year_no => $month_year_name ){
				$monthly_tree_removal_count = $this->getMonthlyTreeRemovalCount( $month_year_no );
				array_push( $monthly_tree_removal_count_array, $monthly_tree_removal_count );
				array_push( $month_year_name_array, $month_year_name );
			}
		}

		$max_no = max( $monthly_tree_removal_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_tree_removal_data_array = array(
			'months_years' => $month_year_name_array,
			'tree_removal_count_data' => $monthly_tree_removal_count_array,
			'max' => $max,
		);

		return $monthly_tree_removal_data_array;

    }



    //number of requests per Province pie chart
    function getTreeRemovalProvinceNames(){
        $provinces = Province::all()->pluck('province');
        $provinces_id = 1;
        $provinces = json_decode($provinces);
        foreach($provinces as $province){
            $province_name_array[$provinces_id] = $province;
            $provinces_id++;
        }
        return $province_name_array;
    }

    function getTreeRemovalProvinceCount($pid){
        $province_count = Tree_Removal_Request::where('province_id', $pid)->pluck('no_of_trees')->sum();
        return $province_count;
    }

    function getTreeRemovalProvinceData(){
        $tree_removal_province_count_array = array();
        $tree_removal_province_array = $this->getTreeRemovalProvinceNames();
        $tree_removal_province_name_array = array();
        $province_id =1;
        if ( ! empty( $tree_removal_province_array ) ) {
            foreach ( $tree_removal_province_array as $province ){
                $tree_removal_province_count = $this->getTreeRemovalProvinceCount( $province_id );
                array_push( $tree_removal_province_count_array, $tree_removal_province_count );
                array_push( $tree_removal_province_name_array, $province );
                $province_id++;
            }
        }
        $tree_removal_province_data_array = array(
            'province' => $tree_removal_province_name_array,
            'tree_removal_province_count_data' => $tree_removal_province_count_array
        );
        return $tree_removal_province_data_array;
    }

        //number of requests per District pie chart
        function getTreeRemovalDistrictNames(){
            $districts = District::all()->pluck('district');
            $districts_id = 1;
            $districts = json_decode($districts);
            foreach($districts as $district){
                $district_name_array[$districts_id] = $district;
                $districts_id++;
            }
            return $district_name_array;
        }
    
        function getTreeRemovalDistrictCount($pid){
            $district_count = Tree_Removal_Request::where('district_id', $pid)->pluck('no_of_trees')->sum();
            return $district_count;
        }
        function rand_color() {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        function getTreeRemovalDistrictData(){
            $tree_removal_district_count_array = array();
            $tree_removal_district_array = $this->getTreeRemovalDistrictNames();
            $tree_removal_district_name_array = array();
            $tree_removal_district_colors=array();
            $district_id =1;
            if ( ! empty( $tree_removal_district_array ) ) {
                foreach ( $tree_removal_district_array as $district ){
                    $tree_removal_district_count = $this->getTreeRemovalDistrictCount( $district_id );
                    array_push( $tree_removal_district_count_array, $tree_removal_district_count );
                    array_push( $tree_removal_district_name_array, $district );
                    $district_color=$this->rand_color();
                    array_push( $tree_removal_district_colors,$district_color);
                    $district_id++;
                }
            }
            $tree_removal_district_data_array = array(
                'district' => $tree_removal_district_name_array,
                'tree_removal_district_count_data' => $tree_removal_district_count_array,
                'district_color'=>$tree_removal_district_colors
            );
            return $tree_removal_district_data_array;
        }



        public function restoration(){
            return view('reporting::restoration');
        }
    //Restorations per month Line Chart
    public function getAllRestorations() {
        $month_year_array=array();
        $restoration_dates = Environment_Restoration::orderBy('created_at','ASC')->pluck('created_at');
        $restoration_dates = json_decode($restoration_dates);
        if( ! empty($restoration_dates)){
            foreach($restoration_dates as $unformatted_date){
                $date = new \DateTime($unformatted_date);
                $month_no = strval($date->format('m'));
                $year_no = strval($date->format('y'));
                $month_year_no=$month_no.$year_no;
                $month_name = $date->format('M');
                $year_name = $date->format('Y');
                $month_year_name=$month_name.(" ").$year_name;
                $month_year_array[$month_year_no] = $month_year_name; //obtains as array of month and years
            }
        }
        return $month_year_array;
    }
    function getMonthlyRestorationCount( $month ) {
        $month_val=intval(substr($month,0,2));
        $year_val=intval("20".substr($month,2));
        $monthly_restoration_count=0;
        $monthly_restoration_count_ids = Environment_Restoration::whereYear('created_at',$year_val)->whereMonth( 'created_at', $month_val )->pluck('id');
        foreach ($monthly_restoration_count_ids as $monthly_restoration_count_id){
            $monthly_restoration_count+=Environment_Restoration_Species::where('environment_restoration_id',$monthly_restoration_count_id)->pluck('quantity')->sum();
        }
        return $monthly_restoration_count;
    }

    function getMonthlyRestorationData() {

        $monthly_restoration_count_array = array();
        $month_year_array = $this->getAllRestorations();
        $month_year_name_array = array();
        if ( ! empty( $month_year_array ) ) {
            foreach ( $month_year_array as $month_year_no => $month_year_name ){
                $monthly_restoration_count = $this->getMonthlyRestorationCount( $month_year_no );
                array_push( $monthly_restoration_count_array, $monthly_restoration_count );
                array_push( $month_year_name_array, $month_year_name );
            }
        }

        $max_no = max( $monthly_restoration_count_array );
        $max = round(( $max_no + 10/2 ) / 10 ) * 10;
        $monthly_restoration_data_array = array(
            'resto_months_years' => $month_year_name_array,
            'restoration_count_data' => $monthly_restoration_count_array,
            'max' => $max,
        );
        return $monthly_restoration_data_array;
    }

            //number of requests per restoration activity type bar chart
    function getRestorationActivityTypes(){
        $activity_types = Environment_Restoration_Activity::all()->pluck('title');
        $activity_types_id = 1;
        $activity_types = json_decode($activity_types);
        $activity_type_array=array();
        foreach($activity_types as $activity_type){
            $activity_type_array[$activity_types_id] = $activity_type;
            $activity_types_id++;
        }
        return $activity_type_array;
    }

    function getRestorationActivityTypeCount($erid){
        $activity_type_count = Environment_Restoration::where('environment_restoration_activity_id', $erid)->count();
        return $activity_type_count;
    }

    function getRestorationActivityTypeData(){
        $restoration_type_count_array = array();
        $restoration_types_array = $this->getRestorationActivityTypes();
        $restoration_type_name_array = array();
        $activity_types_id =1;
        if ( ! empty( $restoration_types_array ) ) {
            foreach ( $restoration_types_array as $activity_type ){
                $restoration_type_count = $this-> getRestorationActivityTypeCount ( $activity_types_id );
                array_push( $restoration_type_count_array, $restoration_type_count );
                array_push( $restoration_type_name_array, $activity_type );
                $activity_types_id++;
            }
        }
        $max_no = max( $restoration_type_count_array );
        $max = round(( $max_no + 10/2 ) / 10 ) * 10;
        $restoration_activity_type_data_array = array(
            'activity_type' => $restoration_type_name_array,
            'restoration_type_count_data' => $restoration_type_count_array,
            'max' => $max,
        );
        return $restoration_activity_type_data_array;
    } 

        //number of Restoration Requests per assigned Ecosystem pie chart
        function getRestorationEcosystemNames(){
            $ecosystems = Ecosystem::all()->pluck('ecosystem_type');
            $ecosystems_id = 1;
            $ecosystems = json_decode($ecosystems);
            foreach($ecosystems as $ecosystem){
                $ecosystem_type_array[$ecosystems_id] = $ecosystem;
                $ecosystems_id++;
            }
            return $ecosystem_type_array;
        }
    
        function getRestorationEcosystemCount($eid){
            $ecosystem_count = Environment_Restoration::where('eco_system_id', $eid)->count();
            return $ecosystem_count;
        }
    
        function getRestorationEcosystemData(){
            $ecosystem_count_array = array();
            $ecosystem_array = $this->getRestorationEcosystemNames();
            $ecosystem_name_array = array();
            $ecosystem_id =1;
            if ( ! empty( $ecosystem_array ) ) {
                foreach ( $ecosystem_array as $ecosystem ){
                    $ecosystem_count = $this->getRestorationEcosystemCount( $ecosystem_id );
                    array_push( $ecosystem_count_array, $ecosystem_count );
                    array_push( $ecosystem_name_array, $ecosystem );
                    $ecosystem_id++;
                }
            }
            $max_no = max( $ecosystem_count_array );
            $max = round(( $max_no + 10/2 ) / 10 ) * 10;
            $ecosystem_data_array = array(
                'ecosystem_name' => $ecosystem_name_array,
                'ecosystem_count_data' => $ecosystem_count_array,
                'max' => $max,
            );
            return $ecosystem_data_array;
        }
    

    

    
}