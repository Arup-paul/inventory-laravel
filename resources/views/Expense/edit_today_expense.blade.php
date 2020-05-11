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
                        <li><a href="#">Expense</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
         <div class="col-md-1"></div>
        <div class="col-md-8">
        <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Update Expense<span class="pull-right">{{date("d-m-Y")}} <a class=" btn btn-primary" href="{{route('today.expense')}}">Today Expense</a> <a class=" btn btn-info" href="{{route('month.expense')}}">This Month Expense</a> </span></h3></div>
            <div class="panel-body">
            <form role="form" action="{{url('/update-expense/'.$tdy->id)}}" method="post" enctype="multipart/form-data">
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
                        <label for="one">Details*</label>
                        <textarea name="details" id="one" class="form-control" cols="30" rows="10">{{$tdy->details}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="two">Amount*</label>
                    <input type="text" class="form-control" name="amount" id="two" value="{{$tdy->amount}}">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="month" id="three" value="{{date("F")}}">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="date" id="four" value="{{date("d-m-Y")}}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="year" id="four" value="{{date("Y")}}">
                    </div>

                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update </button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
        </div>
    </div>
</div>



@endsection
