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
            <div class="panel-heading"><h3 class="panel-title">View Employee</h3></div>
            <div class="panel-body">

                       <!-- Personal-Information -->
                       <div class="panel panel-default panel-fill">
                        <div class="panel-heading">
                            <h3 class="panel-title">Employee Information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="about-info-p">
                                <strong>Full Name</strong>
                                <br/>
                                <p class="text-muted">{{$single->name}}</p>
                            </div>
                            <div class="about-info-p">
                                <strong>Mobile</strong>
                                <br/>
                                <p class="text-muted">{{$single->phone}}</p>
                            </div>
                            <div class="about-info-p">
                                <strong>Email</strong>
                                <br/>
                                <p class="text-muted">{{$single->email}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Address</strong>
                                <br/>
                                <p class="text-muted">{{$single->address}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Experience</strong>
                                <br/>
                                <p class="text-muted">{{$single->experience}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Salary</strong>
                                <br/>
                                <p class="text-muted">{{$single->salary}}</p>
                            </div>

                            <div class="about-info-p m-b-0">
                                <strong>Vacattion</strong>
                                <br/>
                                <p class="text-muted">{{$single->vacation}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>City</strong>
                                <br/>
                                <p class="text-muted">{{$single->city}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Image</strong>
                                <br/>
                                <img src="{{URL::to($single->photo)}}" height="150px" width="120px" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Personal-Information -->



            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
        </div>
    </div>
</div>



@endsection
