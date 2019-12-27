@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
          @endif
            <div class="card">
                <div class="card-header bg-primary text-light d-flex justify-content-between align-items-center ">
                <h5>All Student</h5>
                <a href="{{ route('students.create')}}" class="btn btn-light" >Create Student</a>

              </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @if($students->count() >0)
    @foreach($students as $student)
    <tr>
      <td>{{ $student->id }}</td>
      <td>{{ $student->name }}</td>
      <td>{{ $student->email }}</td>
      <td class="d-flex">
      <a href="{{route('students.edit', $student->id) }}" class="btn btn-info btn-sm" >Edit</a>

      <form action="{{route('students.destroy',['id' => $student->id]) }}" method="POST" class="ml-2">
        @csrf
       @method('DELETE')
       <button type="submit" class="btn btn-danger btn-sm">Delete Data</button>
      </form>
    </td>
    </tr>
    @endforeach
    @else
    <tr>
      <td colspan="4">
        <h5 class="text-center">No Student Found</h5>
      </td>
    </tr>
    @endif
  </tbody>
</table>



                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
