@extends('layouts.layout')   
@section('content')
<div class="row" style="margin-top: 50px;">
    <div class="col-lg-3 margin-tb"></div>
    <div class="col-lg-6 margin-tb">
        <div class="pull-left">
            <h2>Edit Marks</h2>
        </div>
       
    </div>
</div>
@if ($message = Session::get('error'))
        <div class="alert alert-danger">
        
            <p>{{ $message }}</p>
        </div>
    @endif
@if ($errors->any())
    <div class="alert alert-danger">
     
        
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('marks.update',$mark->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row" style="margin-top: 50px;">
     
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Student</strong>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="form-group">
            
                <select name="student_id" id="student_id" style="width:100%">
                    <option value="">Select</option>
                        @foreach ($students as $student)
                            <option value="{{$student->id }}" {{($student->id == $mark->student_id ? 'selected' : '') }} >{{ $student->name }}</option>
                        @endforeach
                </select>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Term</strong>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="form-group">
            
                <select name="term" id="term" style="width:100%">
                    <option value="One"  {{("One" == $mark->term ? 'selected' : '')}}>One</option>
                    <option value="Two" {{("Two" == $mark->term ? 'selected' : '')}}>Two</option>
                </select>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <strong>Marks on each Subjects</strong>
        </div>
        @php
            $mark_list = $mark->mark_list->pluck('mark','subject_id');
        @endphp
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <br>
            @foreach ($subjects as $subject)
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <strong>{{ $subject->name }}</strong>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 ">
                        <div class="form-group">
                            <input type="number"  min='0' name="mark[{{ $subject->id }}]" value="{{ @$mark_list[$subject->id] }}"  class="form-control" placeholder="Mark">
                        </div>
                        
                    </div>
                </div>
            @endforeach
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
