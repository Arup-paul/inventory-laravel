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
                        <li><a href="#">Salary</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
         <div class="col-md-1"></div>
        <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title ">Advance Salary Provide</h3></div>
            <div class="panel-body">
            <form role="form" action="{{url('/insert_advance_salary')}}" method="post" enctype="multipart/form-data">
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
                        <label for="employee">Employee*</label>

                         <select  class=" form-control" name="employee_id" id="employee">
                             @php
                            $emp = DB::table('employees')->get();
                             @endphp
                               <option selected>Select one</option>
                               @foreach($emp as $row)
                         <option value="{{$row->id}}">{{$row->name}}</option>
                               @endforeach
                           </select>
                       </div>

                    <div class="form-group">
                        <label for="month">Month*</label>
                          <select  class="form-control" name="month" id="month">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="year">Year*</label>
                        <input type="text" class="form-control" name="year" id="year" placeholder="Enter Year">
                    </div>

                    <div class="form-group">
                        <label for="name">Advance Salary *</label>
                        <input type="text" class="form-control" name="advance_salary" id="phone" placeholder="Enter Advance Salary">
                    </div>



                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
        </div>
    </div>
</div>



@endsection
