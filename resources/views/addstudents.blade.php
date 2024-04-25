  
@extends('layouts.app')
@section('content')


<h1> hi from add student page</h1>
<form method="POST" action="/students" enctype="multipart/form-data">
    @csrf 
 
  <div class="form-group">
    <label for="exampleInputEmail1">address</label>
    <input type="text" class="form-control" name="address" id="address"  placeholder="Enter address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">age</label>
    <input type="text" class="form-control" name="age" id="age" placeholder="age">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">image</label>
    <input type="file" class="form-control" name="image" id="image" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- /resources/views/post/create.blade.php -->
 
<h1>Create Post</h1>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 @endsection
 