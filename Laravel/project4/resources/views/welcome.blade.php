<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include("cdn")
</head>
<body>
    <div class="container-fluid">
        <h1 class="bg-primary text-white text-center p-4">Form Example</h1>

        <form action="/getformprocess" method="POST">
            @csrf
            <div class="my-2 form-floating">
                <input type="text" name="fname" id="fname" required placeholder="Enter First Name" class="form-control">
                <label class="form-label" for="fname">Enter First Name</label>
            </div>
            <div class="my-2 form-floating">
                <input type="text" name="lname" id="lname" required placeholder="Enter Last Name" class="form-control">
                <label class="form-label" for="lname">Enter Last Name</label>
            </div>

            <div class="my-2 form-floating">
                <input type="submit" value="Send Data" class="btn btn-primary">
                <input type="reset" value="Reset Form" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>
</html>