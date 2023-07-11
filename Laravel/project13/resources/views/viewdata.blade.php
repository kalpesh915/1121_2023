<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include("cdn")
</head>
<body>
    @include("menu")

    <div class="container-fluid">
    @if(session()->has("error"))
            <div class="alert alert-danger alert-dismissible">
                <button class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error : </strong> {{session("error")}}
            </div>
        @endif
        @if(session()->has("msg"))
            <div class="alert alert-success alert-dismissible">
                <button class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Message : </strong> {{session("msg")}}
            </div>
        @endif
        <table class="table table-hover table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Roll</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>EMail</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($studentsdata as $student)
                <tr>
                    <td>{{$student["id"]}}</td>
                    <td>{{$student["fname"]}}</td>
                    <td>{{$student["lname"]}}</td>
                    <td>{{$student["email"]}}</td>
                    <td>{{$student["phone"]}}</td>
                    <td>{{$student["city"]}}</td>
                    <td>{{$student["gender"]}}</td>
                    <td>
                        <a href="/getdataforedit/{{$student['id']}}" class="btn btn-primary">
                            <i class="fa fa-pen"></i>
                        </a>
                        <a href="/deletedata/{{$student['id']}}" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>