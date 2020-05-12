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
             $y= date("Y");
            $expense  = DB::table('expenses')->where('year',$y)->sum('amount');
            @endphp
            <div class="row">
                <div class="col-md-12">
                <h2 class="text-success text-center">Total:{{$expense}}</h2>
                <div>
                    <a href="{{route('2016.expense')}}" class="btn btn-primary">2016</a>
                    <a href="{{route('2017.expense')}}" class="btn btn-info">2017</a>
                    <a href="{{route('2018.expense')}}" class="btn btn-success">2018</a>
                    <a href="{{route('2019.expense')}}" class="btn btn-danger">2019</a>
                    <a href="{{route('2020.expense')}}" class="btn btn-warning">2020</a>
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$date}} Year All Expense <span class="pull-right">   <a class="pull-right btn btn-primary" href="{{route('add.expense')}}">Add New</a> </span></h3>
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
                                            @foreach($year as $single)
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
