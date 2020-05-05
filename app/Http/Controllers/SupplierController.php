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
            'email' => 'required|unique:customers',
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
        $supplier = Suppliers::all();
        return view( 'all_supplier', compact( 'supplier' ) );
    }














}
