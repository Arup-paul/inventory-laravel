<?php

namespace App\Http\Controllers;

use DB;
use PDF;

class PosController extends Controller {
    //
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {

        $products = DB::table( 'products' )
            ->join( 'categories', 'products.category_id', 'categories.id' )
            ->select( 'categories.category_name', 'products.*' )
            ->get();
        $customer   = DB::table( 'customers' )->get();
        $categories = DB::table( 'categories' )->get();

        return view( 'Pos.pos', compact( 'products', 'customer', 'categories' ) );
    }

//pending order

    public function PendingOrder() {
        $pending = DB::table( 'orders' )
            ->join( 'customers', 'orders.customer_id', 'customers.id' )
            ->select( 'customers.name', 'orders.*' )
            ->where( 'order_status', 'pending' )
            ->get();
        return view( 'pos.pending_order', compact( 'pending' ) );
    }

//view order

    public function viewOrder( $id ) {
        $order = DB::table( 'orders' )
            ->join( 'customers', 'orders.customer_id', 'customers.id' )
            ->select( 'orders.*', 'customers.name', 'customers.shop_name', 'customers.city', 'customers.address', 'customers.phone' )
            ->where( 'orders.id', $id )
            ->first();

        $order_details = DB::table( 'orders_details' )
            ->join( 'products', 'orders_details.product_id', 'products.id' )
            ->select( 'orders_details.*', 'products.product_name', 'products.product_code' )
            ->where( 'order_id', $id )
            ->get();

        return view( 'pos.order_confirmation', compact( 'order', 'order_details' ) );

    }

//order confirm
    public function OrderConfirm( $id ) {
        $approve = DB::table( 'orders' )->where( 'id', $id )->update( ['order_status' => 'approved'] );
        if ( $approve ) {
            $notification = array(
                'message' => "Order Confirm | All Products Delivered",
                'alert-type' => 'success',
            );
            return Redirect()->route( 'pending.order' )->with( $notification );
        } else {
            $notification = array(
                'message' => "Error",
                'alert-type' => 'error',
            );
            return Redirect()->back()->with( $notification );
        }

    }

//Approved Order

    public function ApprovedOrder() {
        $pending = DB::table( 'orders' )
            ->join( 'customers', 'orders.customer_id', 'customers.id' )
            ->select( 'customers.name', 'orders.*' )
            ->where( 'order_status', 'approved' )
            ->get();
        return view( 'pos.approved_order', compact( 'pending' ) );
    }

    public function downloadPDF( $id ) {
        $order = DB::table( 'orders' )
        ->join( 'customers', 'orders.customer_id', 'customers.id' )
        ->select( 'orders.*', 'customers.name', 'customers.shop_name', 'customers.city', 'customers.address', 'customers.phone' )
        ->where( 'orders.id', $id )
        ->first();

        $order_details = DB::table( 'orders_details' )
        ->join( 'products', 'orders_details.product_id', 'products.id' )
        ->select( 'orders_details.*', 'products.product_name', 'products.product_code' )
        ->where( 'order_id', $id )
        ->get();
        $pdf = PDF::loadView( 'pos.orderpdf', compact( 'order','order_details' ) );

        return $pdf->download( 'order.pdf',set_time_limit(0) );
    }

}
