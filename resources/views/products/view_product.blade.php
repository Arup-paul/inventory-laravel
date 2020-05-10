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
                        <li><a href="#">Products</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
         <div class="col-md-1"></div>
        <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">View Products</h3></div>
            <div class="panel-body">

                       <!-- Personal-Information -->
                       <div class="panel panel-default panel-fill">
                        <div class="panel-heading">
                            <h3 class="panel-title">Product Information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="about-info-p">
                                <strong>Product Name</strong>
                                <br/>
                                <p class="text-muted">{{$single->product_name}}</p>
                            </div>
                            <div class="about-info-p">
                                <strong>Category</strong>
                                <br/>
                                <p class="text-muted">{{$single->category_name}}</p>
                            </div>
                            <div class="about-info-p">
                                <strong>Supplier Name</strong>
                                <br/>
                                <p class="text-muted">{{$single->name}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Product Code</strong>
                                <br/>
                                <p class="text-muted">{{$single->product_code}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Garage</strong>
                                <br/>
                                <p class="text-muted">{{$single->product_garage}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Route</strong>
                                <br/>
                                <p class="text-muted">{{$single->product_route}}</p>
                            </div>


                            <div class="about-info-p m-b-0">
                                <strong>Buy Date</strong>
                                <br/>
                                <p class="text-muted">{{$single->buy_date}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Expire Date</strong>
                                <br/>
                                <p class="text-muted">{{$single->expire_date}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Buying Price</strong>
                                <br/>
                                <p class="text-muted">{{$single->buying_price}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Selling Price</strong>
                                <br/>
                                <p class="text-muted">{{$single->selling_price}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Image</strong>
                                <br/>
                                <img src="{{URL::to($single->product_image)}}" height="150px" width="120px" alt="">
                            </div>
                            <div class="about-info-p m-b-0">
                            <a class="btn btn-primary" href="{{route('all.product')}}">Ok</a>
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
