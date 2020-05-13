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
                        <li><a href="#">Attendence Sheet</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Attendence<span><a class="pull-right btn btn-primary" href="{{route('take.attendence')}}">Add New</a> </span></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                 <th>Sl</th>
                                                 <th>Date</th>
                                                 <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach($all_attendence as $single)
                                            <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$single->edit_date}}</td>
                                                <td>
                                                    <a  href="{{URL::to('/edit_attendence/'.$single->edit_date)}}" class="btn btn-sm btn-info" >Edit</a>
                                                    <a  href="{{URL::to('/view_attendence/'.$single->edit_date)}}" class="btn btn-sm btn-success" >View</a>

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
