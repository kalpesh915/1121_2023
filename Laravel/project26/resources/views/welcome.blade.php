<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include("cdn")
</head>
<body>
    <h1 class="bg-primary text-center text-white p-4">
        Slot Example
    </h1>

    <x-header year="2023">
        <x-slot:name>Hardik</x-slot:name>
        <x-slot:city>AHamdabad</x-slot:city>
    </x-header>

    
</body>
</html>