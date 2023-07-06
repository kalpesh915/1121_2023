<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include("cdn")
</head>
<body>
    <h1 class="bg-primary text-white p-4 text-center">About Page</h1>
    @include("menu")
    <h3 class="text-center p-4 bg-success text-white">Welcome {{session("username")}}</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsa repellat inventore eum cum adipisci error sapiente praesentium in ullam esse laudantium alias sint corrupti iure vero, dolor ut non.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsa repellat inventore eum cum adipisci error sapiente praesentium in ullam esse laudantium alias sint corrupti iure vero, dolor ut non.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsa repellat inventore eum cum adipisci error sapiente praesentium in ullam esse laudantium alias sint corrupti iure vero, dolor ut non.</p>
</body>
</html>