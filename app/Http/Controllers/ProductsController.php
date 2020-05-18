<?php

namespace App\Http\Controllers;
use App\product;
use DB;
use Illuminate\Http\Request;
use App\Exports\productsExport;
use App\Imports\productsImport;
use Maatwebsite\Excel\Facades\Excel;

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
                $employee              = DB::table( 'products' )
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
        $products = product::all();
        return view( 'products.all_product', compact( 'products' ) );
    }

    //delete Product

    public function deleteProduct( $id ) {
        $delete = DB::table( 'products' )
            ->WHERE( 'id', $id )
            ->first();

        $photo = $delete->product_image;
        unlink( $photo );
        $deleteUser = DB::table( 'products' )
            ->WHERE( 'id', $id )
            ->delete();

        if ( $deleteUser ) {
            $notification = array(
                'message' => "Succesfully Product  Deleted",
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

    //view single Employee

    public function viewProduct( $id ) {
        $single = DB::table( 'products' )
            ->join( 'categories', 'products.category_id', 'categories.id' )
            ->join( 'suppliers', 'products.supplier_id', 'suppliers.id' )
            ->select( 'categories.category_name', 'products.*', 'suppliers.name' )
            ->WHERE( 'products.id', $id )
            ->first();
        return view( 'products.view_product', compact( 'single' ) );
    }

    //Edit page single view
    public function editProduct( Request $request, $id ) {
        $single = DB::table( 'products' )
            ->join( 'categories', 'products.category_id', 'categories.id' )
            ->join( 'suppliers', 'products.supplier_id', 'suppliers.id' )
            ->select( 'categories.category_name', 'products.*', 'suppliers.name' )
            ->WHERE( 'products.id', $id )
            ->first();
        return view( 'products.edit_product', compact( 'single' ) );
    }

    //update Products

    public function updateProduct( Request $request, $id ) {
        $validatedData = $request->validate( [
            'product_name' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'product_code' => 'required',
            'product_garage' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
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

        $image = $request->product_image;

        if ( $image ) {
            $image_name      = bin2hex( random_bytes( 50 ) );
            $ext             = strtolower( $image->getClientOriginalExtension() );
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/products/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move( $upload_path, $image_full_name );

            if ( $success ) {
                $data['product_image'] = $image_url;
                $img           = DB::table( 'products' )->where( 'id', $id )->first();
                $image_path    = $img->product_image;
                $done          = unlink( $image_path );
                $employee      = DB::table( 'products' )->where( 'id', $id )->update( $data );
                if ( $employee ) {
                    $notification = array(
                        'message' => "Succesfully products  Updated",
                        'alert-type' => 'success',
                    );
                    return Redirect()->route( 'all.product' )->with( $notification );

                } else {
                    return Redirect()->back();
                }
            }
        } else {
            $old_photo = $request->old_photo;
            if ( $old_photo ) {
                $data['product_image'] = $old_photo;
                $customer      = DB::table( 'products' )->where( 'id', $id )->update( $data );
                if ( $customer ) {
                    $notification = array(
                        'message' => "Succesfully Products  Updated  without Image",
                        'alert-type' => 'success',
                    );
                    return Redirect()->route( 'all.product' )->with( $notification );

                } else {
                    return Redirect()->back();
                }
            }
        }

    }



     //product import and export

    public function importProduct(){
       return view('products.import_product');
    }

    public function export()
    {
        return Excel::download(new productsExport, 'products.xlsx');
    }

    public function import(Request $request){

        $import = Excel::import(new productsImport, $request->file('import_product'));
        if ( $import ) {
            $notification = array(
                'message' => "Succesfully Products  added",
                'alert-type' => 'success',
            );
            return Redirect()->route( 'all.product' )->with( $notification );
 
        } else {
            return Redirect()->back();
        }


    }


























}
