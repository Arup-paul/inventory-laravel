<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SalaryController extends Controller {
    //
    //
    public function __construct() {
        $this->middleware( 'auth' );
    }
    // index page
    public function addAdvanceSalary() {
        return view( 'salary.advance_salary' );
    }

    //advance salary

    public function InsertAdvanceSalary( Request $request ) {

        $validatedData = $request->validate( [
            'employee_id' => 'required',
            'month' => 'required',
            'advance_salary' => 'required',
            'year' => 'required',
        ] );

        $month       = $request->month;
        $employee_id = $request->employee_id;

        $advance = DB::table( 'advance_salary' )
            ->where( 'month', $month )
            ->where( 'employee_id', $employee_id )
            ->first();

        if ( $advance === NULL ) {
            $data                   = array();
            $data['employee_id']    = $request->employee_id;
            $data['month']          = $request->month;
            $data['advance_salary'] = $request->advance_salary;
            $data['year']           = $request->year;

            $advance = DB::table( 'advance_salary' )->insert( $data );
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

        } else {
            $notification = array(
                'message' => "Oops! Already Advance In this Month",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }

    }

    //show Advance salary Sheet
    public function showAdvanceSalary() {
        $salary = DB::table( 'advance_salary' )
            ->join( 'employees', 'advance_salary.employee_id', 'employees.id' )
            ->select( 'advance_salary.*', 'employees.name', 'employees.salary', 'employees.photo' )
            ->orderBy( 'id', 'DESC' )
            ->get();
        return view( 'salary.all_advance_salary', compact( 'salary' ) );
    }

    //delete Advance Salary
    public function deleteAdvanceSalary( $id ) {

        $delete = DB::table( 'advance_salary' )
            ->WHERE( 'id', $id )
            ->delete();
        if ( $delete ) {
            $notification = array(
                'message' => "Succesfully  Deleted",
                'alert-type' => 'success',
            );
            return Redirect()->route( 'all.advance_salary' )->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }

    }

    //pay salary

    public function Paysalary() {

        $employees = DB::table( 'employees' )->get();
        return view( 'salary.pay_salary', compact( 'employees' ) );
    }

}
