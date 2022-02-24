<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>@yield('title')</title>

</head>
<body>
    <div class="bg-ocean-light dark:bg-ocean-dark bg-opacity-75 flex flex-col items-center ">
        <div class="min-h-screen flex flex-col justify-between lg:w-5/6">
            <div class="z-20">
                @yield('navbar')
            </div>
            <div class="z-10">
                @yield('main')
            </div>
            <div class="z-10">
                @yield('footer')
            </div>
        </div>
    </div>
    <div class="z-0 fixed top-0 left-0 z-0 h-screen w-screen">
        @yield('background')
    </div>
</body>
</html>
