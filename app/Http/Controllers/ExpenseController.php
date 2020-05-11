<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ExpenseController extends Controller {
    //

    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        return view( 'Expense.add_expense' );
    }

    public function store( Request $request ) {
        $validatedData = $request->validate( [
            'details' => 'required',
            'month' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'year' => 'required',
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
            return Redirect()->back()->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }

    }

    public function TodayExpense() {
            $date = date("d-m-Y");
            $today  = DB::table('expenses')->where('date',$date)->get();
            return view('Expense.today_expense',compact('today'));
    }

    public function MonthExpense() {

    }

}
