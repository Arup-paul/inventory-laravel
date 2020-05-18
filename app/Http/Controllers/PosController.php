<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PosController extends Controller
{
    //
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index(){

        $products = DB::table('products')
                   ->join('categories','products.category_id','categories.id')
                   ->select('categories.category_name','products.*')
                   ->get();
        $customer = DB::table('customers')->get();
        $categories = DB::table('categories')->get();

        return view('Pos.pos',compact('products','customer','categories'));
    }
}
