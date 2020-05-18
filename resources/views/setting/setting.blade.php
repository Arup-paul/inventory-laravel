@extends('layouts.app')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Company</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
         <div class="col-md-1"></div>
        <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Update Company  Information</h3></div>
            <div class="panel-body">
            <form role="form" action="{{url('/update-setting/'.$setting->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                  @endif

                    <div class="form-group">
                        <label for="name">Company Name*</label>
                    <input type="text" class="form-control" name="company_name" id="name"  Value="{{$setting->company_name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Company Address*</label>
                        <input type="text" class="form-control" name="company_address" id="email" Value="{{$setting->company_address}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Company Email*</label>
                        <input type="email" class="form-control" name="company_email" id="email" Value="{{$setting->company_email}}">
                    </div>

                    <div class="form-group">
                        <label for="name">Company Phone*</label>
                        <input type="text" class="form-control" name="company_phone" id="phone" Value="{{$setting->company_phone}}">
                    </div>

                    <div class="form-group">
                        <label for="address">Company City*</label>
                        <input type="text" class="form-control" name="company_city" id="address" Value="{{$setting->company_city}}">
                    </div>

                    <div class="form-group">
                        <label for="experience">Country*</label>
                        <input type="text" class="form-control" name="company_country" id="experience" Value="{{$setting->company_country}}">
                    </div>



                    <div class="form-group">
                        <label for="salary">Zip Code*</label>
                        <input type="text" class="form-control" name="company_zipcode" id="salary" Value="{{$setting->company_zipcode}}">
                    </div>





                    <div class="form-group">
                        <img id="image" alt="image" src="#">
                        <label for="photo">New Photo*</label><br>
                        <input type="file" class="form-control" name="company_logo" id="photo" accept="image/*" class="upload" onchange="readURL(this);" placeholder="Enter photo">
                    </div>

                    <div class="form-group">
                        <img id="image" height="80px" width="100px" alt="image" src="{{URL::to($setting->company_logo)}}"  >
                        <label for="photo">Old Photo*</label><br>
                        <input type="hidden" class="form-control" value="{{$setting->company_logo}}" name="old_photo" >
                    </div>



                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update </button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
        </div>
    </div>
</div>



@endsection
