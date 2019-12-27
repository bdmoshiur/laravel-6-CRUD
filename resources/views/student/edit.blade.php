@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light d-flex justify-content-between align-items-center ">
                <h5>Edit Student - {{ $student->name }} </h5>
                <a href="{{ route('students.index')}}" class="btn btn-light" > Back To All Student</a>

              </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                      <div class="col-md-6 offset-3">

                          @if($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif





                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                     <form action="{{ route('students.update',['id' => $student->id]) }}" method="POST" >
                      @csrf
                      @method('PUT')

                    <div class="form-group">
                      <label for="exampleInputName"> Student Name</label>
                      <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter Your Name" value="{{ $student->name }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail"> Student Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Enter Your Email" value="{{ $student->email }}" >
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                  </form>

                        
                      </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
