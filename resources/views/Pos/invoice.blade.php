@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Invoice</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Rio</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                            <h4>Invoice</h4>
                        </div>
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right">Rio</h4>

                                </div>
                                <div class="pull-right">
                                    <h4>Invoice # <br>
                                    <strong>{{date('d/m/Y')}}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                        <strong>Name: {{$customer->name}}</strong><br>
                                          Shop: {{$customer->shop_name}}<br>
                                          Address: {{$customer->address}}<br>
                                          City: {{$customer->city}}<br>
                                          <abbr title="Phone">Phone:</abbr> {{$customer->phone}}
                                          </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Order Date: </strong> {{date('l jS \of F Y ')}}</p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                        @php

                                        @endphp
                                        <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
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
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr></thead>
                                            <tbody>
                                                @php
                                                $sl = 1;
                                                @endphp
                                             @foreach($contents as $single)
                                                <tr>
                                                <td>{{$sl++}}</td>
                                                <td>{{$single->name}}</td>
                                                    <td>{{$single->qty}}</td>
                                                    <td>{{$single->price}}</td>
                                                <td>{{$single->qty*$single->price}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-3 col-md-offset-9">
                                <p class="text-right"><b>Sub-total:</b> {{Cart::subtotal()}}</p>
                                    <p class="text-right">VAT: {{Cart::tax()}}</p>
                                    <hr>
                                    <h3 class="text-right">Total: {{Cart::total()}}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



</div> <!-- container -->

    </div> <!-- content -->


@endsection
