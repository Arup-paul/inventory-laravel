<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SalaryController extends Controller
{
    //
        //
        public function __construct() {
            $this->middleware( 'auth' );
        }
        // index page
        public function index() {
            return view( 'advance_salary' );
        }

        //advance salary

        public function AdvanceSalary(Request $request){
           $data = array();
           $data['employee_id'] = $request->employee_id;
           $data['month'] = $request->month;
           $data['advance_salary'] = $request->advance_salary;
           $data['year'] = $request->year;

          $advance = DB::table('advance_salary')->insert($data);
          if ( $advance ) {
            $notification = array(
                'message' => "Succesfully Advance Salary  Paid",
                'alert-type' => 'success',
            );
            return Redirect()->back()->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }
    }

        }

