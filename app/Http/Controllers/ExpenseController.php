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
            return Redirect()->route('today.expense')->with( $notification );
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

    public function editTodayExpense($id){
        $tdy = DB::table('expenses')->WHERE('id',$id)->first();
        return view('Expense.edit_today_expense',compact('tdy'));
    }

    public function updateTodayExpense(Request $request,$id){
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

        $advance = DB::table( 'expenses' )->where('id',$id)->update( $data );
        if ( $advance ) {
            $notification = array(
                'message' => "Succesfully Expenses Update",
                'alert-type' => 'success',
            );
            return Redirect()->route('today.expense')->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }
    }

    public function deleteExpense($id){
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

    public function MonthExpense() {

    }

}
