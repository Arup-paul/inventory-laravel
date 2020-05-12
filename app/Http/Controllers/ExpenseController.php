<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ExpenseController extends Controller {
    //

    public function __construct() {
        $this->middleware( 'auth' );
    }
    //index
    public function index() {
        return view( 'Expense.add_expense' );
    }
    //new add
    public function store( Request $request ) {
        $validatedData = $request->validate( [
            'details' => 'required',
            'amount' => 'required',
        ] );

        $data            = array();
        $data['details'] = $request->details;
        $data['amount']  = $request->amount;
        $data['month']   = $request->month;
        $data['date']    = $request->date;
        $data['year']    = $request->year;

        $advance = DB::table( 'expenses' )->insert( $data );
        if ( $advance ) {
            $notification = array(
                'message' => "Succesfully Expenses Add",
                'alert-type' => 'success',
            );
            return Redirect()->route( 'today.expense' )->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }

    }
    //current day expense
    public function TodayExpense() {
        $date  = date( "d-m-Y" );
        $today = DB::table( 'expenses' )->where( 'date', $date )->get();
        return view( 'Expense.today_expense', compact( 'today' ) );
    }
    //edit show
    public function editTodayExpense( $id ) {
        $tdy = DB::table( 'expenses' )->WHERE( 'id', $id )->first();
        return view( 'Expense.edit_today_expense', compact( 'tdy' ) );
    }
    ///update expense
    public function updateTodayExpense( Request $request, $id ) {
        $validatedData = $request->validate( [
            'details' => 'required',
            'amount' => 'required',
        ] );

        $data            = array();
        $data['details'] = $request->details;
        $data['amount']  = $request->amount;
        $data['month']   = $request->month;
        $data['date']    = $request->date;
        $data['year']    = $request->year;

        $advance = DB::table( 'expenses' )->where( 'id', $id )->update( $data );
        if ( $advance ) {
            $notification = array(
                'message' => "Succesfully Expenses Update",
                'alert-type' => 'success',
            );
            return Redirect()->route( 'today.expense' )->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }
    }
    //delete expense
    public function deleteExpense( $id ) {
        $delete = DB::table( 'expenses' )
            ->WHERE( 'id', $id )
            ->delete();
        if ( $delete ) {
            $notification = array(
                'message' => "Succesfully  Deleted",
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
    //current month expense
    public function MonthExpense() {
        $date = date( "F" );
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month','date' ) );
    }
//current year expense
    public function YearExpense() {
        $date = date( "Y" );
        $year = DB::table( 'expenses' )->where( 'year', $date )->get();
        return view( 'Expense.year_expense', compact( 'year','date' ) );
    }

    //monthly expence
    //january
    public function JanuaryExpense() {
        $date  = "January";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }

    //February
    public function FebruaryExpense() {
        $date  = "February";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }

    //March
    public function MarchExpense() {
        $date  = "March";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }
    //April
    public function AprilExpense() {
        $date  = "April";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }
    //May
    public function MayExpense() {
        $date  = "May";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }
    //June
    public function JuneExpense() {
        $date  = "June";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }
    //July
    public function JulyExpense() {
        $date  = "July";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }
    //August
    public function AugustExpense() {
        $date  = "April";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }
    //September
    public function SeptemberExpense() {
        $date  = "September";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }
    //October
    public function OctoberExpense() {
        $date  = "October";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }
    //November
    public function NovemberExpense() {
        $date  = "April";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }
    //December
    public function DecemberExpense() {
        $date  = "December";
        $month = DB::table( 'expenses' )->where( 'month', $date )->get();
        return view( 'Expense.month_expense', compact( 'month', 'date' ) );
    }

    //yearly expense

    //2020
    public function Expense2020() {
        $date = "2020";
        $year = DB::table( 'expenses' )->where( 'year', $date )->get();
        return view( 'Expense.year_expense', compact( 'year', 'date' ) );
    }

      //2019
      public function Expense2019() {
        $date = "2019";
        $year = DB::table( 'expenses' )->where( 'year', $date )->get();
        return view( 'Expense.year_expense', compact( 'year', 'date' ) );
    }
      //2018
      public function Expense2018() {
        $date = "2018";
        $year = DB::table( 'expenses' )->where( 'year', $date )->get();
        return view( 'Expense.year_expense', compact( 'year', 'date' ) );
    }
      //2017
      public function Expense2017() {
        $date = "2017";
        $year = DB::table( 'expenses' )->where( 'year', $date )->get();
        return view( 'Expense.year_expense', compact( 'year', 'date' ) );
    }
      //2016
      public function Expense2016() {
        $date = "2016";
        $year = DB::table( 'expenses' )->where( 'year', $date )->get();
        return view( 'Expense.year_expense', compact( 'year', 'date' ) );
    }

}
