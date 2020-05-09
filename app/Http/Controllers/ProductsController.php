<?php

namespace App\Http\Controllers;
use App\Products;
use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller {
    //
    public function __construct() {
        $this->middleware( 'auth' );
    }

    //index
    public function index() {
        return view( 'products.add_product' );
    }
    //product insert
    public function store( Request $request ) {
        $validatedData = $request->validate( [
            'product_name' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'product_code' => 'required',
            'product_garage' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'product_image' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
        ] );

        $data                   = array();
        $data['product_name']   = $request->product_name;
        $data['category_id']    = $request->category_id;
        $data['supplier_id']    = $request->supplier_id;
        $data['product_code']   = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_route']  = $request->product_route;
        $data['buy_date']       = $request->buy_date;
        $data['expire_date']    = $request->expire_date;
        $data['buying_price']   = $request->buying_price;
        $data['selling_price']  = $request->selling_price;

        $image = $request->file( 'product_image' );

        if ( $image ) {
            $image_name      = bin2hex( random_bytes( 50 ) );
            $ext             = strtolower( $image->getClientOriginalExtension() );
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/products/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move( $upload_path, $image_full_name );
            if ( $success ) {
                $data['product_image'] = $image_url;
                $employee      = DB::table( 'products' )
                    ->insert( $data );
                if ( $employee ) {
                    $notification = array(
                        'message' => "Succesfully Product  Inserted",
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
        $products = Products::all();
        return view( 'products.all_product', compact( 'products' ) );
    }
}
