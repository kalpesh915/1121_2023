<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Flash Session Example</h1>
    <form action="sessiondemo" method="post">
        @csrf
        <input type="text" id="fname" name="fname" required placeholder="Enter Your Name">
        <input type="submit" value="Send Data">
    </form>
</body>
</html>