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
                        <li><a href="#">All Supplier</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Supplier<span><a class="pull-right btn btn-primary" href="{{route('add.supplier')}}">Add New</a> </span></h3>
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
                                            @foreach($suppliers as $supplier)
                                            <tr>
                                            <td>{{$supplier->name}}</td>
                                            <td>{{$supplier->email}}</td>
                                            <td>{{$supplier->phone}}</td>
                                            <td>{{$supplier->address}}</td>
                                            <td><img src="{{$supplier->photo}}" alt="image" height="80px" width="100px"></td>
                                                <td>
                                                    <a href="{{URL::to('/edit_supplier/'.$supplier->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                    <a  href="{{URL::to('/view_supplier/'.$supplier->id)}}" class="btn btn-sm btn-primary" >View</a>
                                                    <a  href="{{URL::to('/delete_supplier/'.$supplier->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>

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
