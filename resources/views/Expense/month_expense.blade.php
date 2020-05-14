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
                        <li><a href="#">Month Expense</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            @php
             $mon= $date;
            $expense  = DB::table('expenses')->where('month',$mon)->sum('amount');
            @endphp
                <h2 class="text-success text-center">Total:{{$expense}}</h2>
            <div>
                <a href="{{route('january.expense')}}" class="btn btn-primary">January</a>
                <a href="{{route('february.expense')}}" class="btn btn-info">February</a>
                <a href="{{route('march.expense')}}" class="btn btn-success">March</a>
                <a href="{{route('april.expense')}}" class="btn btn-danger">April</a>
                <a href="{{route('may.expense')}}" class="btn btn-warning">May</a>
                <a href="{{route('june.expense')}}" class="btn btn-default">June</a>
                <a href="{{route('july.expense')}}" class="btn btn-primary">July</a>
                <a href="{{route('august.expense')}}" class="btn btn-info">August</a>
                <a href="{{route('september.expense')}}" class="btn btn-danger">September</a>
                <a href="{{route('october.expense')}}" class="btn btn-success">October</a>
                <a href="{{route('november.expense')}}" class="btn btn-warning">November</a>
                <a href="{{route('december.expense')}}" class="btn btn-default">December</a>
            </div>
            <div class="row">
                <div class="col-md-12">


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$date}} Month All Expense <span class="pull-right">   <a class="pull-right btn btn-primary" href="{{route('add.expense')}}">Add New</a> </span></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($month as $single)
                                            <tr>
                                            <td>{{$single->details}}</td>
                                            <td>{{$single->amount}}</td>
                                            <td>{{$single->date}}</td>
                                            <td>{{$single->month}}</td>
                                            <td>{{$single->year}}</td>
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
