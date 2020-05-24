@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Order Confirmation</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Rio</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                            <h4>Order Confirmation</h4>
                        </div>
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right">Rio</h4>

                                </div>
                                <div class="pull-right">
                                    <h4>Order # <br>
                                    <strong>{{$order->order_date}}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                        <strong>Name: {{$order->name}}</strong><br>
                                          Shop: {{$order->shop_name}}<br>
                                          Address: {{$order->address}}<br>
                                          City: {{$order->city}}<br>
                                          <abbr title="Phone">Phone:</abbr> {{$order->phone}}
                                          </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Today: </strong> {{date('l jS \of F Y ')}}</p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                        @php

                                        @endphp
                                        <p class="m-t-10"><strong>Order ID: </strong> {{{$order->id}}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr><th>#</th>
                                                <th>Product name</th>
                                                <th>Product Code</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr></thead>
                                            <tbody>
                                                @php
                                                $sl = 1;
                                                @endphp
                                             @foreach($order_details as $single)
                                                <tr>
                                                <td>{{$sl++}}</td>
                                                <td>{{$single->product_name}}</td>
                                                    <td>{{$single->product_code}}</td>
                                                    <td>{{$single->quantity}}</td>
                                                    <td>{{$single->unitcost}}</td>
                                                <td>{{$single->quantity*$single->unitcost}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-9">

                                <h4>Payment Status:{{$order->payment_status}}</h4>
                                <h4>Pay: {{$order->pay}}</h4>
                                <h4>Due: {{$order->due}}</h4>
                                </div>
                                <div class="col-md-3 ">
                                <p class="text-right"><b>Sub-total:</b> {{$order->sub_total}}</p>
                                    <p class="text-right">VAT: {{$order->vat}}</p>
                                    <hr>
                                    <h3 class="text-right">Total: {{$order->total}}</h3>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>

                </div>

            </div>



</div> <!-- container -->

    </div> <!-- content -->




@endsection

