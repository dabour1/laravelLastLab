<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class=" vh-100 p-4 row align-items-center ">
<table class="table p-2 table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Address</th>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th class="text-center" scope="col" colspan="3">buttons</th>
       
    </tr>
  </thead>
  <tbody>
  
    <tr>
        
      <th scope="row">{{ $student["id"] }}</th>
      <td>{{ $student["address"] }}</td>
      <td>{{ $student["name"] }}</td>
      <td>{{ $student["age"] }}</td>

      <td><a class="btn btn-info " href="/students/{{ $student["id"] }}">shwo</a></td>
      <td><a class="btn btn-success  " href="/students/{{ $student["id"] }}">Edit</a></td>
      <td><a  class="btn btn-danger " href="/students/{{ $student["id"] }}">shwo</a></td>
    </tr>
    
  </tbody>
</table>
 

</body>
</html>