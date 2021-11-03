@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detail Siswa</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nama Siswa : </strong> {{$biodata->title}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>description : </strong> {{$biodata->description}}
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <strong>image : </strong> 
          
          <img src="{{ asset('uploads/'.$biodata->image)}}" width="100px;" height="100px;" alt="{{$biodata->image}}">
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{route('biodata.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection
