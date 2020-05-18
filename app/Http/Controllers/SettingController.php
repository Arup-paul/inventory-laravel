<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
    //
      //auth
      public function __construct() {
        $this->middleware( 'auth' );
    }

    public function Setting(){
        $setting = DB::table('settinges')->first();
        return view('setting.setting',compact('setting'));
    }


    public function updateSetting( Request $request, $id ) {
        $validatedData = $request->validate( [
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required|max:13',
            'company_city' => 'required',
            'company_country' => 'required',
            'company_zipcode' => 'required'
        ] );

        $data               = array();
        $data['company_name']       = $request->company_name;
        $data['company_address']      = $request->company_address;
        $data['company_email']      = $request->company_email;
        $data['company_phone']    = $request->company_phone;
        $data['company_city'] = $request->company_city;
        $data['company_country']     = $request->company_country;
        $data['company_zipcode']   = $request->company_zipcode;

        $image = $request->company_logo;

        if ( $image ) {
            $image_name      = bin2hex( random_bytes( 50 ) );
            $ext             = strtolower( $image->getClientOriginalExtension() );
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/setting/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move( $upload_path, $image_full_name );

            if ( $success ) {
                $data['company_logo'] = $image_url;
                $img           = DB::table( 'settinges' )->where( 'id', $id )->first();
                $image_path    = $img->company_logo;
                $done          = unlink( $image_path );
                $employee      = DB::table( 'settinges' )->where( 'id', $id )->update( $data );
                if ( $employee ) {
                    $notification = array(
                        'message' => "Succesfully   Updated",
                        'alert-type' => 'success',
                    );
                    return Redirect()->back()->with( $notification );

                } else {
                    return Redirect()->back();
                }
            }
        } else {
            $old_photo = $request->old_photo;
            if ( $old_photo ) {
                $data['company_logo'] = $old_photo;
                $customer      = DB::table( 'settinges' )->where( 'id', $id )->update( $data );
                if ( $customer ) {
                    $notification = array(
                        'message' => "Succesfully   Updated  without logo",
                        'alert-type' => 'success',
                    );
                    return Redirect()->back()->with( $notification );

                } else {
                    return Redirect()->back();
                }
            }
        }

    }
}
