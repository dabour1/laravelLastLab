<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="row justify-content-center  p-4">

 
<form class="w-50" method="POST" action="/students/{{$student['id']}}" enctype="multipart/form-data">
    @csrf 
    @method("patch")
  <div class="form-group">
    <label for="exampleInputid">id</label>
    <input type="email" class="form-control"
    value="{{$student["id"]}}"
    id="exampleInputid" name="id"   disabled>
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">address</label>
    <input type="text" class="form-control" 
    value="{{$student["address"]}}"
    name="address" id="address"  placeholder="Enter address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">name</label>
    <input type="text" class="form-control" name="name"
    value="{{$student["name"]}}"
    id="name" placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">age</label>
    <input type="text" class="form-control" name="age"
    value="{{$student["age"]}}"
    id="age" placeholder="age">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">image</label>
    <input type="file" class="form-control" name="image" id="image" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
</body>
</html>