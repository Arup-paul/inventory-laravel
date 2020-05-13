<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendence;

class AttendenceController extends Controller {
    //
    public function __construct() {
        $this->middleware( 'auth' );
    }

    //take attendence show
    public function TakeAttendence() {
        $employees = DB::table( 'employees' )->get();
        return view( 'Attendence.take-attendence', compact( 'employees' ) );
    }

    public function InsertAttendence( Request $request ) {
        $validatedData = $request->validate( [
            'attendence' => 'required',
        ] );

        $date = $request->attendence_date;

        $attendence_date = DB::table( 'attendences' )->where( 'attendence_date', $date )->first();
        if ( $attendence_date ) {
            $notification = array(
                'message' => "Today attendence already Taken",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        } else {
            $emp = $request->employee_id;
            foreach ( $emp as $id ) {
                $data[] = [
                    "employee_id" => $id,
                    "attendence" => $request->attendence[$id],
                    "attendence_date" => $request->attendence_date,
                    "attendence_year" => $request->attendence_year,
                    "attendence_month" => $request->attendence_month,
                    "edit_date" => date( "d_m_Y" ),
                ];
            }
            $att = DB::table( 'attendences' )->insert( $data );
            if ( $att ) {
                $notification = array(
                    'message' => "Take Attendence Succesfully",
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

    public function AllAttendence() {
        $all_attendence = DB::table( 'attendences' )
            ->select( 'edit_date' )
            ->groupBy( 'edit_date' )
            ->get();
        return view( 'attendence.all_attendence', compact( 'all_attendence' ) );
    }

    public function editAttendence( $edit_date ) {
        $edit_attendence = DB::table( 'attendences' )
            ->join( 'employees', 'attendences.employee_id', 'employees.id' )
            ->where( 'edit_date', $edit_date )
            ->get();
        return view( 'attendence.edit_attendence', compact( 'edit_attendence' ) );
    }

    public function UpdateAttendence( Request $request) {

        foreach ( $request->id as $id ) {
            $data = [
                "attendence" => $request->attendence[$id],
                "attendence_date" => $request->attendence_date,
                "attendence_year" => $request->attendence_year,
                "attendence_month" => $request->attendence_month,
            ];
        }

               $att =   Attendence::where(
                    [
                        'attendence_date' => $request->attendence_date,
                         'id' => $id
                         ] )
                    ->first()->update( $data );




        if ( $attendence ) {
            $notification = array(
                'message' => "Update Attendence Succesfully",
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

    public function viewAttendence($edit_date){
        $edit_attendence = DB::table( 'attendences' )
            ->join( 'employees', 'attendences.employee_id', 'employees.id' )
            ->where( 'edit_date', $edit_date )
            ->get();
        return view( 'attendence.view_attendence', compact( 'edit_attendence' ));
    }


}
