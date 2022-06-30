@extends('layouts.layout')
 
@section('content')
    <div class="row">
        
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Teacher List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('teacher.create') }}"> Create new </a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
        
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered" id="table_content">
        <tr>
            <th>No</th>
            <th>Name</th>
          
            <th width="250px">Action</th>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $teacher->name }}</td>
     
            <td>
                <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('teacher.edit',$teacher->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>

                  
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $teachers->links() !!}
      
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  
    
</script>