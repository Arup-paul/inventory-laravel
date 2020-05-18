@extends('layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-success text-white">
                    <h4 class="pull-left page-title text-white">POS (Point of Sale) </h4>
                    <ol class="breadcrumb pull-right">
                        <li>Inventory</li>
                        <li >{{date('d/m/Y')}}</li>
                    </ol>
                </div>
            </div> <br>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="portfolioFilter">
                        @foreach( $categories as $cat)
                        <a href="#" data-filter="*" class="current">{{$cat->category_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-5">
                    <div class="panel">
                            <h4 class="text-info pull-left">Customer</h4>
                            <a href="" class="btn btn-sm btn-primary pull-right btn btn-sm  btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New</a>

                            <select class="form-control">
                                   <option disable selected>Select a Customer</option>
                                   @foreach($customer as $cus)
                                   <option value="{{$cus->id}}">{{$cus->name}}</option>
                                   @endforeach
                            </select>

                        </div>

                        <div class="price_card text-center">
                            <ul class="price-features" style="border:1px solid #ddd;">
                                <table class="table">
                                    <thead class="bg-info">
                                        <tr>
                                           <th class="text-white">Name</th>
                                           <th class="text-white">Qty</th>
                                           <th class="text-white">Price</th>
                                           <th class="text-white">Sub Total</th>
                                           <th class="text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Arup</td>
                                            <td>
                                                <input type="number" style="width:40px;" name="" value="2">
                                                <button type="submit" class="btn btn-sm btn-success" style="margin-top:-6px;" ><i class="md md-check"></i></button>
                                            </td>
                                            <td>2200</td>
                                            <td>34</td>
                                            <td><i class="md md-delete text-danger" style="font-size: 20px;"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </ul>
                            <div class="pricing-header bg-primary">
                                <br>
                               <p style="font-size: 18px;"> Quantity:2 </p>
                               <p style="font-size: 18px;"> Vat:2% </p>
                               <hr>
                               <p><h2 class="text-white">Total:</h2><h1 class="text-white">00.00</h1> </p>
                               <br>
                            </div>
                            <button type="submit" class="btn btn-success">Create A Invoice</button>

                        </div> <!-- end Pricing_card -->
                    </div>




                <div class="col-lg-7">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Selling Price</th>
                                <th>Expire Date</th>
                                <th>Garage</th>
                                <th>Route</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach($products as $single)
                            <tr>
                                <td>
                                    <a href="#" style="font-size:20px; color:#f2f2f2;background:black;padding:0 5px; ">+</a>
                                    <img src="{{$single->product_image}}" alt="image" height="80px" width="100px"></td>
                                <td>{{$single->product_name}}</td>
                                <td>{{$single->product_code}}</td>
                                <td>{{$single->selling_price}}</td>
                                <td>{{$single->expire_date}}</td>
                                <td>{{$single->product_garage}}</td>
                                <td>{{$single->product_route}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>









        </div> <!-- container -->

    </div> <!-- content -->
{{-- modal  --}}

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add a Customer</h4>
            </div>



            <div class="modal-body">
                <form  action="{{url('/insert-customer')}}" method="post" enctype="multipart/form-data">
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

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Name</label>
                            <input type="text" name="name" class="form-control" id="field-4" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" id="field-5" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="field-6" placeholder="Enter Phone">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Address</label>
                            <input type="text" name="address" class="form-control" id="field-6" placeholder="Enter Address">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Shop Name</label>
                            <input type="text" name="shop_name" class="form-control" id="field-6" placeholder="Enter Shop Name">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Account Holder</label>
                            <input type="text" name="account_holder" class="form-control" id="field-6" placeholder="Enter Account Holder">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Account Number</label>
                            <input type="text" name="account_number" class="form-control" id="field-6" placeholder="Enter Account Number">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" id="field-6" placeholder="Enter Bank Name">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Bank Branch Name</label>
                            <input type="text" name="bank_branch" class="form-control" id="field-6" placeholder="Enter Bank Branch Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">City</label>
                            <input type="text" name="city" class="form-control" id="field-6" placeholder="Enter City">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <img id="image" alt="image" src="#">
                            <label for="photo">Product Image*</label>
                            <input type="file" class="form-control" name="photo" id="photo" accept="image/*" class="upload" onchange="readURL(this);">
                        </div>
                    </div>


                </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
            </div>
        </form>
        </div>

        </div>
    </div>
</div>

{{-- modal  --}}

@endsection
