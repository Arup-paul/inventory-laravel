<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class categoryController extends Controller
{
    //

    public function __construct() {
        $this->middleware( 'auth' );
    }
    // index page
    public function index() {
        return view( 'category' );
    }

    public function store(Request $request){
        $validatedData = $request->validate( [
            'category_name' => 'required'
        ] );


            $data                   = array();
            $data['category_name']    = $request->category_name;

            $category = DB::table( 'categories' )->insert( $data );
            if ( $category ) {
                $notification = array(
                    'message' => "Succesfully Add Category",
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

    public function show(){
        $category = DB::table( 'categories' )
        ->get();
    return view( 'all_categories', compact( 'category' ) );
    }

    public function deleteCategory( $id ) {

        $delete = DB::table( 'categories' )
            ->WHERE( 'id', $id )
            ->delete();
        if ( $delete ) {
            $notification = array(
                'message' => "Succesfully  Deleted",
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

}
