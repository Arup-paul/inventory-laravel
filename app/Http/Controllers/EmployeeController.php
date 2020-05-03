<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller {
    //
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        return view( 'add_employee' );
    }

    public function store(Request $request) {
        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required|unique:employees',
            'phone' => 'required|max:13',
            'address' => 'required',
            'experience' => 'required',
            'photo' => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
            'nid_no' => 'required',
        ] );

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $data['nid_no'] = $request->nid_no;

        $image = $request->file('photo');

        if($image){
            $image_name = bin2hex( random_bytes( 50 ) );
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/employee/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo'] = $image_url;
                $employee = DB::table('employees')
                        ->insert($data);
                  if($employee){
                      $notification = array(
                          'message' => "Succesfully Employee  Inserted",
                          'alert-type'=>'success'
                      );
                      return Redirect()->route('home')->with($notification);
                  }else{
                    $notification = array(
                        'message' => "Error",
                        'alert-type'=>'error'
                    );
                    return Redirect()->back()->with($notification);
                  }
            }else{
                return Redirect()->back();
            }
        }else{
            return Redirect()->back();
        }


}

 public function show(){
    return view( 'all_employee' );
 }





}
