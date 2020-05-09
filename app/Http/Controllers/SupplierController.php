<?php

namespace App\Http\Controllers;

use App\Suppliers;
use DB;
use Illuminate\Http\Request;

class SupplierController extends Controller {
    //
    //auth
    public function __construct() {
        $this->middleware( 'auth' );
    }

    // index page
    public function index() {
        return view( 'add_supplier' );
    }

    // add Supplier

    public function store( Request $request ) {
        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required|unique:suppliers',
            'phone' => 'required|max:13',
            'address' => 'required',
            'photo' => 'required',
            'type' => 'required',
            'shop' => 'required',
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
        $data['type']           = $request->type;
        $data['shop']           = $request->shop;
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
            $upload_path     = 'public/supplier/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move( $upload_path, $image_full_name );
            if ( $success ) {
                $data['photo'] = $image_url;
                $employee      = DB::table( 'suppliers' )
                    ->insert( $data );
                if ( $employee ) {
                    $notification = array(
                        'message' => "Succesfully Suppliers  Inserted",
                        'alert-type' => 'success',
                    );
                    return Redirect()->route( 'all.supplier' )->with( $notification );
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

    //show Supplier
    public function show() {
        $suppliers = Suppliers::all();
        return view( 'all_supplier', compact( 'suppliers' ) );
    }

    //view single suppliers
    public function viewSuppliers( $id ) {
        $single = DB::table( 'suppliers' )
            ->WHERE( 'id', $id )
            ->first();
        return view( 'view_supplier', compact( 'single' ) );
    }

    //delete Suppliers
    public function deleteSupplier( $id ) {
        $delete = DB::table( 'suppliers' )
            ->WHERE( 'id', $id )
            ->first();

        $photo = $delete->photo;
        unlink( $photo );
        $deletesupplier = DB::table( 'suppliers' )
            ->WHERE( 'id', $id )
            ->delete();

        if ( $deletesupplier ) {
            $notification = array(
                'message' => "Succesfully Suppliers  Deleted",
                'alert-type' => 'success',
            );
            return Redirect()->route( 'all.supplier' )->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }

    }

    //view suppplier  edit page
    public function editSupplier( $id ) {
        $edit = DB::table( 'suppliers' )
            ->WHERE( 'id', $id )
            ->first();
        return view( 'edit_supplier', compact( 'edit' ) );
    }

    //update Supplier

    public function updateSupplier( Request $request, $id ) {
        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|max:13',
            'address' => 'required',
            'type' => 'required',
            'shop' => 'required',
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
        $data['type']           = $request->type;
        $data['shop']           = $request->shop;
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
            $upload_path     = 'public/supplier/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move( $upload_path, $image_full_name );

            if ( $success ) {
                $data['photo'] = $image_url;
                $img           = DB::table( 'suppliers' )->where( 'id', $id )->first();
                $image_path    = $img->photo;
                $done          = unlink( $image_path );
                $supplier      = DB::table( 'suppliers' )->where( 'id', $id )->update( $data );
                if ( $supplier ) {
                    $notification = array(
                        'message' => "Succesfully Supplier  Updated",
                        'alert-type' => 'success',
                    );
                    return Redirect()->route( 'all.supplier' )->with( $notification );

                }
             } else {
                    return Redirect()->back();
             }
            } else {
               $old_photo = $request->old_photo;
                if ( $old_photo ) {
                    $data['photo'] = $old_photo;
                    $supplier      = DB::table( 'suppliers' )->where( 'id', $id )->update( $data );
                    if ( $supplier ) {
                        $notification = array(
                            'message' => "Succesfully Supplier  Updated  without Image",
                            'alert-type' => 'success',
                        );
                        return Redirect()->route( 'all.supplier' )->with( $notification );

                    } else {
                        return Redirect()->back();
                    }
                }
            }

        }

    }


