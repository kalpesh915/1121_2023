<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include("cdn")
</head>
<body>
    <h1>{{10 + 20}}</h1>
    <hr>


    @if(11 >= 10)
    <p>True</p>
    @else
    <p>False</p>
    @endif

    <hr>

    {{-- @for($x=1; $x<=10; $x++)
        <p>{{$x}}</p>
    @endfor --}}

    <hr>

    <!-- @foreach($students as $student)
        <p class="text-center text-white bg-primary p-4">Welcome {{$student}}</p>
    @endforeach -->

    <hr>
    <!-- <button onclick="getDate()">Click Me</button> -->
</body>
</html>

<script>
    function getDate(){
        //alert("Today is "+new Date());
        alert(@json($students));
    }
</script>