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
                        <li><a href="#">All Employee</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Employee</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                 <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($employees as $employee)
                                            <tr>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td>{{$employee->address}}</td>
                                            <td><img src="{{$employee->photo}}" alt="image" height="80px" width="100px"></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                                    <a  href="{{URL::to('/view_employee/'.$employee->id)}}" class="btn btn-sm btn-primary" >View</a>
                                                    <a  href="{{URL::to('/delete-employee/'.$employee->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection
