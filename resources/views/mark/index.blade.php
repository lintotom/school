@extends('layouts.layout')
 
@section('content')
    <div class="row">
        
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mark List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('marks.create') }}"> Create new </a>
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

    @if($subjects->count() == 0)

    <div class="alert alert-danger">
        <p>No subject Listed.. please run seeder</p>
    </div>
    @else
   
    <table class="table table-bordered" id="table_content">
        <tr>
            <th>No</th>
            <th>Name</th>
            @foreach($subjects as $subject)
            <th>{{ $subject->name }}</th>
            @endforeach
            <th>Term</th>
            <th>Total Marks</th>
            <th>Created On</th>
            
          
            <th width="250px">Action</th>
        </tr>
        @foreach ($marks as $mark)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mark->student->name }}</td>

            @php
            $mark_list  = $mark->mark_list->pluck('mark','subject_id');
            $total      = 0;
            @endphp
          
            @foreach($subjects as $subject)
                @if(@$mark_list[$subject->id])
                    @php $total      += $mark_list[$subject->id]; @endphp
                @endif
            <td>{{ @$mark_list[$subject->id] }}</td>
            @endforeach
            
            <td>{{ $mark->term }}</td>
            <td>{{ $total }}</td>
            <td>{{ \Carbon\Carbon::parse($mark->created_at)->format('M d, Y h:i A') }}</td>
            <td>
                <form action="{{ route('marks.destroy',$mark->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('marks.edit',$mark->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>

                  
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $marks->links() !!}
   
    
    @endif

      
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  
    
</script>