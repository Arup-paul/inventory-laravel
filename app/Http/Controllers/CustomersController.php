<?php

namespace App\Http\Controllers;
use App\Customers;
use DB;
use Illuminate\Http\Request;

class CustomersController extends Controller {
    //auth
    public function __construct() {
        $this->middleware( 'auth' );
    }

    // index page
    public function index() {
        return view( 'customers.add_customer' );
    }

    // add customer

    public function store( Request $request ) {
        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required|unique:customers',
            'phone' => 'required|max:13',
            'address' => 'required',
            'photo' => 'required',
            'shop_name' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'city' => 'required',
        ] );

        $data                   = array();
        $data['name']           = $request->name;
        $data['email']          = $request->email;
        $data['phone']          = $request->phone;
        $data['address']        = $request->address;
        $data['shop_name']      = $request->shop_name;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name']      = $request->bank_name;
        $data['bank_branch']    = $request->bank_branch;
        $data['city']           = $request->city;

        $image = $request->file( 'photo' );

        if ( $image ) {
            $image_name      = bin2hex( random_bytes( 50 ) );
            $ext             = strtolower( $image->getClientOriginalExtension() );
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/customers/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move( $upload_path, $image_full_name );
            if ( $success ) {
                $data['photo'] = $image_url;
                $employee      = DB::table( 'customers' )
                    ->insert( $data );
                if ( $employee ) {
                    $notification = array(
                        'message' => "Succesfully Customers  Inserted",
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
                return Redirect()->back();
            }
        } else {
            return Redirect()->back();
        }

    }

    //show Customers
    public function show() {
        $customers = Customers::all();
        return view( 'customers.all_customers', compact( 'customers' ) );
    }

//view single customers
    public function viewCustomers( $id ) {
        $single = DB::table( 'customers' )
            ->WHERE( 'id', $id )
            ->first();
        return view( 'customers.view_customer', compact( 'single' ) );
    }

    //delete Customers
    public function deleteCustomers( $id ) {
        $delete = DB::table( 'customers' )
            ->WHERE( 'id', $id )
            ->first();

        $photo = $delete->photo;
        unlink( $photo );
        $deletecustomer = DB::table( 'customers' )
            ->WHERE( 'id', $id )
            ->delete();

        if ( $deletecustomer ) {
            $notification = array(
                'message' => "Succesfully Customers  Deleted",
                'alert-type' => 'success',
            );
            return Redirect()->route( 'all.customer' )->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }

    }

    //view customer  edit page
    public function editCustomers( $id ) {
        $edit = DB::table( 'customers' )
            ->WHERE( 'id', $id )
            ->first();
        return view( 'customers.edit_customer', compact( 'edit' ) );

    }

    //update customer

    public function updateCustomer( Request $request, $id ) {
        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|max:13',
            'address' => 'required',
            'shop_name' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'city' => 'required',
        ] );

        $data                   = array();
        $data['name']           = $request->name;
        $data['email']          = $request->email;
        $data['phone']          = $request->phone;
        $data['address']        = $request->address;
        $data['shop_name']      = $request->shop_name;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name']      = $request->bank_name;
        $data['bank_branch']    = $request->bank_branch;
        $data['city']           = $request->city;

        $image = $request->photo;

        if ( $image ) {
            $image_name      = bin2hex( random_bytes( 50 ) );
            $ext             = strtolower( $image->getClientOriginalExtension() );
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/customers/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move( $upload_path, $image_full_name );

            if ( $success ) {
                $data['photo'] = $image_url;
                $img           = DB::table( 'customers' )->where( 'id', $id )->first();
                $image_path    = $img->photo;
                $done          = unlink( $image_path );
                $employee      = DB::table( 'customers' )->where( 'id', $id )->update( $data );
                if ( $employee ) {
                    $notification = array(
                        'message' => "Succesfully Customers  Updated",
                        'alert-type' => 'success',
                    );
                    return Redirect()->route( 'all.customer' )->with( $notification );

                } else {
                    return Redirect()->back();
                }
            }
            }
            else {
                $old_photo = $request->old_photo;
                 if ( $old_photo ) {
                     $data['photo'] = $old_photo;
                     $customer      = DB::table( 'customers' )->where( 'id', $id )->update( $data );
                     if ( $customer ) {
                         $notification = array(
                             'message' => "Succesfully Customer  Updated  without Image",
                             'alert-type' => 'success',
                         );
                         return Redirect()->route( 'all.customer' )->with( $notification );

                     } else {
                         return Redirect()->back();
                     }
                 }
             }

        }

    }

