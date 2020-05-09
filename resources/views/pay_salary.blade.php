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
                        <li><a href="#"> Salary Sheet</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Pay Salary  <span class ="pull-right text-danger"> {{date("F Y")}}</span></h3>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                 <th>Employe Name</th>
                                                 <th>Image</th>
                                                 <th>Salary</th>
                                                 <th>Month</th>
                                                 <th>Advance</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                         {{-- Return Advance salary of employees --}}
{{-- 
                                         @php
                                              $month = date( "F", strtotime( '-1 month' ) );
                                                $salary = DB::table( 'advance_salary' )
                                                    ->join( 'employees', 'advance_salary.employee_id', 'employees.id' )
                                                    ->select( 'advance_salary.*', 'employees.name', 'employees.salary', 'employees.photo' )
                                                    ->where( 'month', $month )
                                                    ->orderBy( 'id', 'DESC' )
                                                    ->get();

                                         @endphp --}}

                                         {{-- end --}}
                                        <tbody>
                                            @foreach($employees as $single)
                                            <tr>
                                            <td>{{$single->name}}</td>
                                            <td><img src="{{$single->photo}}" alt="image" height="80px" width="100px"></td>
                                            <td>{{$single->salary}}</td>
                                            <td><span class="badge badge-success">{{date('F',strtotime('-1 month'))}}</span></td>
                                            <td>
                                            </td>

                                                <td>
                                                    <a  href="" class="btn btn-sm btn-warning ">Pay Now</a>

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
