@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-3 margin-tb"></div>
    <div class="col-lg-6 margin-tb">
        <div class="pull-left">
            <h2>Create Teacher</h2>
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
   
<form action="{{ route('teacher.store') }}" method="POST">
    @csrf
     <div class="row" style="margin-top: 50px;">
       
            <div class="col-xs-3 col-sm-3 col-md-3">
                <strong>Teacher Name</strong>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
                <div class="form-group">
                
                    <input type="text" name="name"  class="form-control" placeholder="Name">
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