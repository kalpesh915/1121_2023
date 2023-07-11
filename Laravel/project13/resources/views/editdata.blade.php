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
        <h1 class="bg-primary text-white text-center p-5">Edit Data</h1>
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

        <form action="/updateprocess/{{$studentData['id']}}" method="post">
            @csrf
            <div class="my-2 form-floating">
                <input type="text" name="fname" id="fname" placeholder="Enter First Name" class="form-control" required value="{{$studentData['fname']}}">
                <label class="form-label" for="fname">Enter First Name</label>
            </div>
            <div class="my-2 form-floating">
                <input type="text" name="lname" id="lname" placeholder="Enter Last Name" class="form-control" required value="{{$studentData['lname']}}">
                <label class="form-label" for="lname">Enter Last Name</label>
            </div>
            <div class="my-2 form-floating">
                <input type="email" name="email" id="email" placeholder="Enter Email Address" class="form-control" required value="{{$studentData['email']}}">
                <label class="form-label" for="email">Enter Email Address</label>
            </div>
            <div class="my-2 form-floating">
                <input type="text" name="phone" id="phone" placeholder="Enter Phone Number" class="form-control" required pattern="\d{10,13}" value="{{$studentData['phone']}}">
                <label class="form-label" for="phone">Enter Phone Number</label>
            </div>
            <div class="my-2 form-floating">
                <input type="text" name="city" id="city" placeholder="Enter City Name" class="form-control" required value="{{$studentData['city']}}">
                <label class="form-label" for="city">Enter City Name</label>
            </div>
            <div class="my-2 form-floating">
                <select name="gender" id="gender" placeholder="Select Gender" class="form-control" required>
                    @if($studentData["gender"] === "male")
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                    @else
                        <option value="male">Male</option>
                        <option value="female" selected>Female</option>
                    @endif
                </select>
                <label class="form-label" for="gender">Select Gender</label>
            </div>
            
            <div class="my-2 form-floating">
                <input type="submit" value="Save Student" class="btn btn-primary">
                <input type="reset" value="Reset" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>
</html>