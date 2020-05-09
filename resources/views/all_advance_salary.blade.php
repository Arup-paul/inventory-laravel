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
                        <li><a href="#">Advance Salary Sheet</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Advance Salary Employe</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                 <th>Employe Name</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($salary as $single)
                                            <tr>
                                            <td>{{$single->name}}</td>
                                            <td><img src="{{$single->photo}}" alt="image" height="80px" width="100px"></td>
                                            <td>{{$single->month}}</td>
                                            <td>{{$single->year}}</td>
                                            <td>{{$single->advance_salary}}</td>
                                                <td>
                                                    <a href="{{URL::to('/edit_employee/'.$single->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                    <a  href="{{URL::to('/view_employee/'.$single->id)}}" class="btn btn-sm btn-primary" >View</a>
                                                    <a  href="{{URL::to('/delete_employee/'.$single->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>

                                                </td>
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
