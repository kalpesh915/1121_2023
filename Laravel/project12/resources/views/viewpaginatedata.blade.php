<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include("cdn")

    <style>
        .w-5{
            width: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Roll</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>

            <tbody>
                @foreach($studentdata as $student)
                    <tr>
                        <td>{{$student["roll"]}}</td>
                        <td>{{$student["fname"]}}</td>
                        <td>{{$student["lname"]}}</td>
                        <td>{{$student["email"]}}</td>
                        <td>{{$student["phone"]}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        {{$studentdata->links()}}
        </div>
    </div>
</body>
</html>