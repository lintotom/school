@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-3 margin-tb"></div>
    <div class="col-lg-6 margin-tb">
        <div class="pull-left">
            <h2>Create New Student</h2>
        </div>
        
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
       
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('student.store') }}" method="POST">
    @csrf
     <div class="row" style="margin-top: 50px;">
       
            <div class="col-xs-3 col-sm-3 col-md-3">
                <strong>Student Name</strong>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
                <div class="form-group">
                
                    <input type="text" name="name"  class="form-control" placeholder="Name">
                </div>
                
                
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <strong>DOB</strong>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
                <div class="form-group">
                
                    <input type="date" name="dob"  class="form-control" placeholder="Date of Birth">
                </div>
                
                
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <strong>Gender</strong>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
                <div class="form-group">
                
                    <select name="gender" id="gender" style="width:100%">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <strong>Teacher</strong>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
                <div class="form-group">
                
                    <select name="teacher_id" id="teacher_id" style="width:100%">
                        <option value="">Select</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id }}" >{{ $teacher->name }}</option>
                            @endforeach
                    </select>
                </div>
                
            </div>
        </div>
        
   
        
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3">
              
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
</form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

$(document ).ready(function() {
       
      
});
   
    
</script>