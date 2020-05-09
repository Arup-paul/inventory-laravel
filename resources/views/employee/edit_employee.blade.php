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
                        <li><a href="#">Employee</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
         <div class="col-md-1"></div>
        <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Update Employee Information</h3></div>
            <div class="panel-body">
            <form role="form" action="{{url('/update-employee/'.$edit->id)}}" method="post" enctype="multipart/form-data">
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
                        <label for="name">Name*</label>
                    <input type="text" class="form-control" name="name" id="name"  Value="{{$edit->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email" id="email" Value="{{$edit->email}}">
                    </div>

                    <div class="form-group">
                        <label for="name">Phone*</label>
                        <input type="text" class="form-control" name="phone" id="phone" Value="{{$edit->phone}}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address*</label>
                        <input type="text" class="form-control" name="address" id="address" Value="{{$edit->address}}">
                    </div>

                    <div class="form-group">
                        <label for="experience">Experience*</label>
                        <input type="text" class="form-control" name="experience" id="experience" Value="{{$edit->experience}}">
                    </div>



                    <div class="form-group">
                        <label for="salary">Salary*</label>
                        <input type="text" class="form-control" name="salary" id="salary" Value="{{$edit->salary}}">
                    </div>

                    <div class="form-group">
                        <label for="vacation">Vacation*</label>
                        <input type="text" class="form-control" name="vacation" id="vacation" Value="{{$edit->vacation}}">
                    </div>

                    <div class="form-group">
                        <label for="city">City*</label>
                        <input type="text" class="form-control" name="city" id="city" Value="{{$edit->city}}">
                    </div>
                    <div class="form-group">
                        <label for="nid_no">Nid No*</label>
                        <input type="text" class="form-control" name="nid_no" id="nid_no" Value="{{$edit->nid_no}}">
                    </div>

                    <div class="form-group">
                        <img id="image" alt="image" src="#">
                        <label for="photo">New Photo*</label><br>
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" class="upload" onchange="readURL(this);" placeholder="Enter photo">
                    </div>

                    <div class="form-group">
                        <img id="image" height="80px" width="100px" alt="image" src="{{URL::to($edit->photo)}}"  >
                        <label for="photo">Old Photo*</label><br>
                        <input type="hidden" class="form-control" value="{{$edit->photo}}" name="old_photo" >
                    </div>



                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update Employee</button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
        </div>
    </div>
</div>



@endsection
