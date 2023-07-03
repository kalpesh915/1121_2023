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
        <h1 class="display-1 bg-primary text-white text-center p-5">URL Example</h1>
        <p>{{URL::current()}}</p>
        <p>{{URL::full()}}</p>
        <p><a href="{{URL::to('/')}}">Home</a></p>
        <p>{{URL::previous()}}</p>
        <p><a href="{{URL::previous()}}">Back</a></p>
    </div>
</body>
</html>