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
                        <li><a href="#">Supplier</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
         <div class="col-md-1"></div>
        <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Add Supplier</h3></div>
            <div class="panel-body">
            <form role="form" action="{{url('/insert-supplier')}}" method="post" enctype="multipart/form-data">
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
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" name="name" id="name"  placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label for="name">Phone*</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
                    </div>

                    <div class="form-group">
                        <label for="address">Address*</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
                    </div>

                    <div class="form-group">
                        <label for="type">Supplier Type*</label>
                         <select name="type" class="form-control" id="type">
                             <option value="Distributor">Distributor</option>
                             <option value="WholeSeller">Whole Seller</option>
                             <option value="Brochure">Brochure</option>
                         </select>

                    </div>

                    <div class="form-group">
                        <label for="shop_name">Shop Name*</label>
                        <input type="text" class="form-control" name="shop" id="shop" placeholder="Enter Shop Name">
                    </div>



                    <div class="form-group">
                        <label for="account_holder">Account Holder*</label>
                        <input type="text" class="form-control" name="account_holder" id="account_holder" placeholder="Enter Account Holder">
                    </div>

                    <div class="form-group">
                        <label for="account_number">Account Number*</label>
                        <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Enter Account Number">
                    </div>

                    <div class="form-group">
                        <label for="bank_name">Bank Name*</label>
                        <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Name">
                    </div>
                    <div class="form-group">
                        <label for="bank_branch">Bank Branch*</label>
                        <input type="text" class="form-control" name="bank_branch" id="bank_branch" placeholder="Enter Bank Branch">
                    </div>

                    <div class="form-group">
                        <label for="city">City*</label>
                        <input type="text" class="form-control" name="city" id="bank_branch" placeholder="Enter City">
                    </div>

                    <div class="form-group">
                        <img id="image" alt="image" src="#">
                        <label for="photo">Photo*</label>
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" class="upload" onchange="readURL(this);" placeholder="Enter photo">
                    </div>





                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add Supplier</button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
        </div>
    </div>
</div>



@endsection
