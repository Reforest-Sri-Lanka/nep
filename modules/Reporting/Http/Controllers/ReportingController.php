<?php
namespace Reporting\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class ReportingController extends Controller {
    // Routing logic
    public function overview() {
        //direct back to the index page.
        return view('reporting::overview');
    }

}