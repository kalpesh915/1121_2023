<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>File Upload Example</h1>
    <form action="uploadprocess" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file1" required>
        <input type="submit" value="Upload File">
    </form>
</body>
</html>