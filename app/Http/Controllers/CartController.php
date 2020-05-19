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

}
