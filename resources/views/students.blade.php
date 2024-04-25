   
@extends('layouts.app')
@section('content')

<div class=" vh-100 p-4 row align-items-center ">
<table class="table p-2 table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Address</th>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th scope="col">image</th>
      <th class="text-center" scope="col" colspan="3">buttons</th>
       
    </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
    <tr>
        
      <th scope="row">{{ $student["id"] }}</th>
      <td>{{ $student["address"] }}</td>
      <td>{{ $student["name"] }}</td>
      <td>{{ $student["age"] }}</td>
      <td> <img src="{{ asset('storage/' . $student->image) }}" width="300px" alt="" srcset=""></td>

      <td><a class="btn btn-info " href="/students/{{ $student["id"] }}">shwo</a></td>
      <td><a class="btn btn-success  " href="/students/{{ $student["id"] }}/edit">Edit</a></td>
      <td> <form method="post" action="/students/{{ $student["id"] }}">
    @csrf
    @method("DELETE")
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
        
      
    </tr>
    @endforeach
  </tbody>
</table>
 
<div class=" ">
    {{ $students->links() }}
</div>

</div>
 
@endsection
 