@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Biodata Siswa</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('biodata.update',$biodata->id)}}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
        @method("PATCH")
      <div class="row">
        <div class="col-md-12">
          <strong>title :</strong>
          <input type="text" name="title" class="form-control" value="{{$biodata->title}}">
        </div>
        <div class="col-md-12">
          <strong>description :</strong>
          <textarea class="form-control" name="description" rows="8" cols="80">{{$biodata->description}}</textarea>
        </div>

        <div class="col-md-12">
          <strong>Images :</strong>
          <input type="file" name="image" value="{{$biodata->image}}">
          <label>choose file</label>
        </div>

        <div class="col-md-12">
          <a href="{{route('biodata.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection
