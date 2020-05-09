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
            <div class="panel-heading"><h3 class="panel-title">Add Products</h3></div>
            <div class="panel-body">
            <form role="form" action="{{url('/insert-product')}}" method="post" enctype="multipart/form-data">
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
                        <label for="name">Product Name*</label>
                        <input type="text" class="form-control" name="product_name" id="name"  placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                           @php
                              $cat = DB::table('categories')->get();
                            @endphp
                        <label for="email">Category*</label>
                        <select name="category_id" class="form-control" id="">
                            <option>Select</option>
                                @foreach($cat as $row)
                            <option value="{{$row->id}}">{{$row->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        @php
                           $sup = DB::table('suppliers')->get();
                         @endphp
                     <label for="email">Supplier*</label>
                     <select name="supplier_id" class="form-control" id="">
                         <option>Select</option>
                             @foreach($sup as $row)
                         <option value="{{$row->id}}">{{$row->name}}</option>
                         @endforeach
                     </select>
                 </div>

                    <div class="form-group">
                        <label for="name">Product Code*</label>
                        <input type="text" class="form-control" name="product_code" id="phone" placeholder="Enter Product Code">
                    </div>

                    <div class="form-group">
                        <label for="address">Godawn*</label>
                        <input type="text" class="form-control" name="product_garage" id="address" placeholder="Enter Product Garage">
                    </div>

                    <div class="form-group">
                        <label for="shop_name">Product Route*</label>
                        <input type="text" class="form-control" name="product_route" id="shop_name" placeholder="Enter Product Route">
                    </div>



                    <div class="form-group">
                        <label for="account_holder">Buy Date*</label>
                        <input type="date" class="form-control" name="buy_date" id="account_holder" placeholder="Enter Buy Date">
                    </div>

                    <div class="form-group">
                        <label for="account_number">Expire Date*</label>
                        <input type="date" class="form-control" name="expire_date" id="account_number" placeholder="Enter Expire Date">
                    </div>

                    <div class="form-group">
                        <label for="bank_name">Buying Price*</label>
                        <input type="text" class="form-control" name="buying_price" id="bank_name" placeholder="Enter Buying Price">
                    </div>
                    <div class="form-group">
                        <label for="bank_branch">Selling Price*</label>
                        <input type="text" class="form-control" name="selling_price" id="selling_price" placeholder="Enter Selling Price">
                    </div>



                    <div class="form-group">
                        <img id="image" alt="image" src="#">
                        <label for="photo">Product Image*</label>
                        <input type="file" class="form-control" name="product_image" id="photo" accept="image/*" class="upload" onchange="readURL(this);">
                    </div>





                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add Products</button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
        </div>
    </div>
</div>



@endsection
