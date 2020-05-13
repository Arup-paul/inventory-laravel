
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
                        <li><a href="#">Attendence</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">View Attendence</h3>
                        </div>
                    <h3 class="text-success" align="center">  {{date("d/m/Y")}}</h3>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <table  class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                 <th>Name</th>
                                                <th>Image</th>
                                                <th>Attendence</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach($edit_attendence as $single)
                                            <tr>
                                            <td>{{$single->name}}</td>
                                            <td><img src="{{URL::to($single->photo)}}" alt="image" height="80px" width="100px"></td>
                                            <input type="hidden" name="id[]" value="{{$single->id}}">
                                            <td>
                                               <input type="radio" name="attendence[{{$single->id}}]" disabled value="present"
                                               <?php if($single->attendence == 'present'){
                                                    echo "checked";
                                                   }
                                                   ?> required> Present
                                               <input type="radio" disabled name="attendence[{{$single->id}}]" value="absence"
                                               <?php if($single->attendence == 'absence'){
                                                echo "checked";
                                               }
                                               ?> required> Absence
                                            </td>
                                        <input type="hidden" name="attendence_date" value="{{date("d/m/Y")}}">
                                        <input type="hidden" name="attendence_year" value="{{date("Y")}}">
                                        <input type="hidden" name="attendence_month" value="{{date("M")}}">

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
