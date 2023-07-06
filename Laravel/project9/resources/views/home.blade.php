<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        @if(session()->has("fname"))
            <h1>{{session("fname")}}</h1>
        @else
            <h1>Welcome Guest</h1>
        @endif
    </h1>
</body>
</html>