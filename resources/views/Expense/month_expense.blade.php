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
             $mon= date("F");
            $expense  = DB::table('expenses')->where('month',$mon)->sum('amount');
            @endphp
            <div class="row">
                <div class="col-md-12">
                <h2 class="text-success text-center">Total:{{$expense}}</h2>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{date("F")}} Month All Expense <span class="pull-right">   <a class="pull-right btn btn-primary" href="{{route('add.expense')}}">Add New</a> </span></h3>
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
