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
                        <li><a href="#">All Employee</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Take Attendence</h3>
                        </div>
                    <h3 class="text-success" align="center">  {{date("d/m/Y")}}</h3>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form action="{{url('/insert-attendence')}}" method="post">
                                        @csrf
                                    <table  class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                 <th>Name</th>
                                                <th>Image</th>
                                                <th>Attendence</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach($employees as $employee)
                                            <tr>
                                            <td>{{$employee->name}}</td>
                                            <td><img src="{{$employee->photo}}" alt="image" height="80px" width="100px"></td>
                                            <input type="hidden" name="employee_id[]" value="{{$employee->id}}">
                                            <td>
                                               <input type="radio" name="attendence[{{$employee->id}}]" value="present" required> Present
                                               <input type="radio" name="attendence[{{$employee->id}}]" value="absence" required> Absence
                                            </td>
                                        <input type="hidden" name="attendence_date" value="{{date("d/m/Y")}}">
                                        <input type="hidden" name="attendence_year" value="{{date("Y")}}">
                                        <input type="hidden" name="attendence_month" value="{{date("M")}}">

                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-success  " >Take Attendence</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection
