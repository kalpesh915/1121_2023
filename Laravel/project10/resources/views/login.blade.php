<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include("cdn")
</head>
<body>
    <h1 class="bg-primary text-center text-white p-5">Login Page</h1>
    @if(session()->has("error"))
        <div class="alert alert-danger alert-dismissible">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error : </strong> {{session("error")}}
        </div>
    @elseif(session()->has("success"))
        <div class="alert alert-success alert-dismissible">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success : </strong> {{session("success")}}
        </div>
    @endif
    <form action="loginprocess" method="post">
        @csrf
        <div class="form-floating my-2">
            <input type="email" name="email" id="email" require class="form-control" placeholder="Enter Email Address">
            <label class="form-lable" for="email">Enter Email Address</label>
        </div>
        <div class="form-floating my-2">
            <input type="password" name="upass" id="upass" require class="form-control" placeholder="Enter Password">
            <label class="form-lable" for="upass">Enter Password</label>
        </div>
        <div class="form-floating my-2">
            <input type="submit" value="Login" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-danger">
        </div>
    </form>
</body>
</html>