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
                        <li><a href="#">Pending Orders</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Pending Orders</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> Name</th>
                                                <th>Order Date</th>
                                                <th>Total Products</th>
                                                <th>Sub Total</th>
                                                <th>Vat</th>
                                                <th>Total</th>
                                                <th>Payment Status</th>
                                                <th>Pay</th>
                                                <th>Due</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($pending as $single)
                                            <tr>
                                            <td>{{$single->name}}</td>
                                            <td>{{$single->order_date}}</td>
                                            <td>{{$single->total_products}}</td>
                                            <td>{{$single->sub_total}}</td>
                                            <td>{{$single->vat}}</td>
                                            <td>{{$single->total}}</td>
                                            <td><span class="badge badge-danger">{{$single->payment_status}}</span></td>
                                            <td>{{$single->pay}}</td>
                                            <td>{{$single->due}}</td>

                                                <td>

                                                    <a  href="{{URL::to('/view_order_status/'.$single->id)}}" class="btn btn-sm btn-info">View</a>

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
