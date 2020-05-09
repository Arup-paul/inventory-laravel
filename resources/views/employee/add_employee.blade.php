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
                        <li><a href="#">Employee</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
         <div class="col-md-1"></div>
        <div class="col-md-8">
        <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Add Employee<span><a class="pull-right btn btn-primary" href="{{route('all.employee')}}">All</a> </span></h3></div>
            <div class="panel-body">
            <form role="form" action="{{url('/insert-employee')}}" method="post" enctype="multipart/form-data">
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
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" name="name" id="name"  placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label for="name">Phone*</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
                    </div>

                    <div class="form-group">
                        <label for="address">Address*</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
                    </div>

                    <div class="form-group">
                        <label for="experience">Experience*</label>
                        <input type="text" class="form-control" name="experience" id="experience" placeholder="Enter Experience">
                    </div>



                    <div class="form-group">
                        <label for="salary">Salary*</label>
                        <input type="text" class="form-control" name="salary" id="salary" placeholder="Enter salary">
                    </div>

                    <div class="form-group">
                        <label for="vacation">Vacation*</label>
                        <input type="text" class="form-control" name="vacation" id="vacation" placeholder="Enter vacation">
                    </div>

                    <div class="form-group">
                        <label for="city">City*</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter city">
                    </div>
                    <div class="form-group">
                        <label for="nid_no">Nid No*</label>
                        <input type="text" class="form-control" name="nid_no" id="nid_no" placeholder="Enter NID">
                    </div>

                    <div class="form-group">
                        <img id="image" alt="image" src="#">
                        <label for="photo">Photo*</label>
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" class="upload" onchange="readURL(this);" placeholder="Enter photo">
                    </div>





                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add Employee</button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
        </div>
    </div>
</div>

{{-- <script>
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image')
                   .attr('src',e.target.result)
                   .width(80)
                   .height(80)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script> --}}

@endsection
