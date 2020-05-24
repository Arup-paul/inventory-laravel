<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller {
    //
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index( Request $request ) {
        $data          = array();
        $data['id']    = $request->id;
        $data['name']  = $request->name;
        $data['qty']   = $request->qty;
        $data['price'] = $request->price;
        $data['weight'] = $request->weight;

        $add = Cart::add($data);
        if ( $add ) {
            $notification = array(
                'message' => "product Add",
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

    public function update(Request $request,$rowId){

          $qty = $request->qty;
          $update =  Cart::update($rowId,$qty );

          if ( $update ) {
            $notification = array(
                'message' => "product QTY Update",
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

    public function remove($rowId){
       $remove = Cart::remove($rowId);
       if ( $remove ) {
        $notification = array(
            'message' => "product Remove ",
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

    public function CreateInvoice(Request $request){
      $request->validate([
         'customer_id' =>'required'
      ],
      [
          'customer_id.required'=> 'Select a Customer '
      ]);

      $customer_id = $request->customer_id;
      $customer = DB::table('customers')->where('id',$customer_id)->first();
      $contents = Cart::content();
     return view('pos.invoice',compact('customer','contents') );


   }

   public function FinalInvoice(Request $request){
    $request->validate([
        'payment_status' =>'required',
        'pay' =>'required',
        'due' =>'required'
     ],
     [
         'payment_status.required'=> 'Select a Payment status '
     ]);

     $data = array();
     $data['customer_id'] = $request->customer_id;
     $data['order_date'] = $request->order_date;
     $data['order_status'] = $request->order_status;
     $data['total_products'] = $request->total_products;
     $data['sub_total'] = $request->sub_total;
     $data['vat'] = $request->vat;
     $data['total'] = $request->total;
     $data['payment_status'] = $request->payment_status;
     $data['pay'] = $request->pay;
     $data['due'] = $request->due;

    $order_id = DB::table('orders')->insertGetId($data);
    $contents = Cart::content();

    $odata = array();
    foreach ($contents as $content) {
        $odata['order_id'] = $order_id;
        $odata['product_id'] = $content->id;
        $odata['quantity'] = $content->qty;
        $odata['unitcost'] = $content->price;
        $odata['total'] = $content->total;
        $insert = DB::table('orders_details')->insert($odata);
    }
    if ( $insert ) {
        $notification = array(
            'message' => "Invoice Created | Deliver the products and accept status",
            'alert-type' => 'success',
        );
         Cart::destroy();
        return Redirect()->route('pending.order')->with( $notification );
    } else {
        $notification = array(
            'message' => "Error",
            'alert-type' => 'error',
        );
        return Redirect()->back()->with( $notification );

}




   }

}
