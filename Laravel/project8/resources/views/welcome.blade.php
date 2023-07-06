<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome Blade File</h1>
    <hr>
    <h1>GET Method Example</h1>
    <form method="get" action="getprocess">
        <input type="text" value="Rajkot" name="city">
        <input type="submit" value="Send Data">
    </form>
    <hr>
    <h1>POST Method Example</h1>
    <form method="post" action="postprocess">
        @csrf
        <input type="text" value="Rajkot" name="city">
        <input type="submit" value="Send Data">
    </form>
    <hr>
    <h1>PUT Method Example</h1>
    <form method="post" action="putprocess">
        @csrf
        {{method_field("put")}}
        <input type="text" value="Rajkot" name="city">
        <input type="submit" value="Send Data">
    </form>
    <hr>
    <h1>DELETE Method Example</h1>
    <form method="post" action="deleteprocess">
        @csrf
        {{method_field("delete")}}
        <input type="text" value="Rajkot" name="city">
        <input type="submit" value="Send Data">
    </form>
</body>
</html>