<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com/"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Home</title>
</head>
<body class="" id="body">
    <div class="bg-ocean-light dark:bg-ocean-dark bg-opacity-75 flex flex-col items-center ">
        <div class="min-h-screen  flex flex-col justify-between lg:w-5/6">
            <div class="z-20">
                @yield('navbar')
            </div>
            <div class="z-10 flex-grow flex flex-col">
                @yield('content')
            </div>
            <div class="z-10">
                @yield('footer')
            </div>
        </div>
    </div>
</body>
</html>
