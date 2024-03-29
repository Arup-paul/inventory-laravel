<?php

namespace App\Http\Controllers;
use App\Employee;
use DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller {
    //
    public function __construct() {
        $this->middleware( 'auth' );
    }
    // index page
    public function index() {
        return view( 'employee.add_employee' );
    }

    // add employe
    public function store( Request $request ) {
        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required|unique:employees',
            'phone' => 'required|max:13',
            'address' => 'required',
            'experience' => 'required',
            'photo' => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
            'nid_no' => 'required|unique:employees',
        ] );

        $data               = array();
        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['phone']      = $request->phone;
        $data['address']    = $request->address;
        $data['experience'] = $request->experience;
        $data['salary']     = $request->salary;
        $data['vacation']   = $request->vacation;
        $data['city']       = $request->city;
        $data['nid_no']     = $request->nid_no;

        $image = $request->file( 'photo' );

        if ( $image ) {
            $image_name      = bin2hex( random_bytes( 50 ) );
            $ext             = strtolower( $image->getClientOriginalExtension() );
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/employee/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move( $upload_path, $image_full_name );
            if ( $success ) {
                $data['photo'] = $image_url;
                $employee      = DB::table( 'employees' )
                    ->insert( $data );
                if ( $employee ) {
                    $notification = array(
                        'message' => "Succesfully Employee  Inserted",
                        'alert-type' => 'success',
                    );
                    return Redirect()->route( 'home' )->with( $notification );
                } else {
                    $notification = array(
                        'message' => "Error",
                        'alert-type' => 'error',
                    );
                    return Redirect()->back()->with( $notification );
                }
            } else {
                return Redirect()->back();
            }
        } else {
            return Redirect()->back();
        }

    }

    //show employee
    public function show() {
        $employees = Employee::all();
        return view( 'employee.all_employee', compact( 'employees' ) );
    }

    //view single Employee

    public function viewEmployee( $id ) {
        $single = DB::table( 'employees' )
            ->WHERE( 'id', $id )
            ->first();
        return view( 'employee.view_employee', compact( 'single' ) );
    }

    //delete Employee
    public function deleteEmployee( $id ) {
        $delete = DB::table( 'employees' )
            ->WHERE( 'id', $id )
            ->first();

        $photo = $delete->photo;
        unlink( $photo );
        $deleteUser = DB::table( 'employees' )
            ->WHERE( 'id', $id )
            ->delete();

        if ( $deleteUser ) {
            $notification = array(
                'message' => "Succesfully Employee  Deleted",
                'alert-type' => 'success',
            );
            return Redirect()->route( 'all.employee' )->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }

    }

    //view employe  edit page
    public function editEmployee( $id ) {
        $edit = DB::table( 'employees' )
            ->WHERE( 'id', $id )
            ->first();
        return view( 'employee.edit_employee', compact( 'edit' ) );

    }

    //update employee

    public function updateEmployee( Request $request, $id ) {
        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|max:13',
            'address' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
            'nid_no' => 'required',
        ] );

        $data               = array();
        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['phone']      = $request->phone;
        $data['address']    = $request->address;
        $data['experience'] = $request->experience;
        $data['salary']     = $request->salary;
        $data['vacation']   = $request->vacation;
        $data['city']       = $request->city;
        $data['nid_no']     = $request->nid_no;

        $image = $request->photo;

        if ( $image ) {
            $image_name      = bin2hex( random_bytes( 50 ) );
            $ext             = strtolower( $image->getClientOriginalExtension() );
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/employee/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move( $upload_path, $image_full_name );

            if ( $success ) {
                $data['photo'] = $image_url;
                $img           = DB::table( 'employees' )->where( 'id', $id )->first();
                $image_path    = $img->photo;
                $done          = unlink( $image_path );
                $employee      = DB::table( 'employees' )->where( 'id', $id )->update( $data );
                if ( $employee ) {
                    $notification = array(
                        'message' => "Succesfully Employee  Updated",
                        'alert-type' => 'success',
                    );
                    return Redirect()->route( 'all.employee' )->with( $notification );

                } else {
                    return Redirect()->back();
                }
            }
        } else {
            $old_photo = $request->old_photo;
            if ( $old_photo ) {
                $data['photo'] = $old_photo;
                $customer      = DB::table( 'employees' )->where( 'id', $id )->update( $data );
                if ( $customer ) {
                    $notification = array(
                        'message' => "Succesfully Employees  Updated  without Image",
                        'alert-type' => 'success',
                    );
                    return Redirect()->route( 'all.employee' )->with( $notification );

                } else {
                    return Redirect()->back();
                }
            }
        }

    }

}
