<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#1b263a] text-[#9ba6ba]">
    <div class="container py-10">
        @yield('content')
    </div>


    @vite('resources/js/app.js')
</body>
</html>
