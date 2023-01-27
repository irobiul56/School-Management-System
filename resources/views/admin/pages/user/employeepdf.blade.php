<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <style>
    th, td{
      font-size: 11px;
    }
  </style>
</head>
<body>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table mb-0 data-table-search w-auto p-1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($user as $item)
                <tr>
                    <td>{{$loop -> index + 1}}</td>
                    <td>{{$item -> name}}</td>
                    <td>{{$item -> designation -> name}}</td>
                    <td>{{$item -> phone}}</td>
                    <td>{{$item -> gender}}</td>
                    <td>{{$item -> dob}}</td>
                    <td><img style=" border-radius: 50%; padding: 5px; width: 60px; height: 60px" src="{{url('storage/user/'. $item -> image )}}" alt=""></td>
                   
  
                </tr>
                    
                @endforeach 
            </tbody>
        </table>
    </div>
  </div>
</body>
</html>