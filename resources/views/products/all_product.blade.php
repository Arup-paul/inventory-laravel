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
                        <li><a href="#">All Product</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Product</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Selling Price</th>
                                                <th>Expire Date</th>
                                                <th>Garage</th>
                                                <th>Route</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($products as $single)
                                            <tr>
                                            <td>{{$single->product_name}}</td>
                                            <td>{{$single->product_code}}</td>
                                            <td>{{$single->selling_price}}</td>
                                            <td>{{$single->expire_date}}</td>
                                            <td>{{$single->product_garage}}</td>
                                            <td>{{$single->product_route}}</td>
                                            <td><img src="{{$single->product_image}}" alt="image" height="80px" width="100px"></td>
                                                <td>
                                                    <a href="{{URL::to('/edit_product/'.$single->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                    <a  href="{{URL::to('/view_product/'.$single->id)}}" class="btn btn-sm btn-primary" >View</a>
                                                    <a  href="{{URL::to('/delete_product/'.$single->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>

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
