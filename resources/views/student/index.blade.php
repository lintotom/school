@extends('layouts.layout')
 
@section('content')
    <div class="row">
        
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Student List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('student.create') }}"> Create new </a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
   
    <table class="table table-bordered" id="table_content">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Teacher</th>
          
            <th width="250px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ \Carbon\Carbon::parse($student->dob)->age }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->teacher->name }}</td>
            <td>
                <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('student.edit',$student->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>

                  
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $students->links() !!}
      
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  
    
</script>