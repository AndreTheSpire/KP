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
            <div class="flex bg-ocean-light h-screen my-5">
                <div class="flex flex-col w-1/4 h-3/4 px-4 py-8 overflow-y-auto border-r bg-stone-50 rounded-lg ">
                    <div class="flex border-double border-4 border-indigo-600">
                        <img src="{{url('/image/studentpp.jpg')}}" alt="" class="object-contain h-24 w-36">
                        <div class="flex items-center justify-center">
                            <div class="text-xl">{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}</div>
                        </div>
                    </div>




                  <div class="flex flex-col justify-between mt-6 border-double border-4 border-indigo-600">
                    <aside>
                      <ul>
                        <li>Kelas ku</li>
                        <li>
                          <a class="flex items-center px-4 py-2 text-gray-700 rounded-md " href="/admin">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>

                            <span class="mx-4 font-medium">Dashboard</span>
                            {{-- <span class="font-medium text-white bg-red-600 content-center w-7 h-7 rounded-full">99</span> --}}
                          </a>
                        </li>
                        <li>
                            <a class="flex items-center px-4 py-2 text-gray-700 rounded-md " href="/admin">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>

                              <span class="mx-4 font-medium">Dashboard</span>
                              {{-- <span class="font-medium text-white bg-red-600 content-center w-7 h-7 rounded-full">99</span> --}}
                            </a>
                          </li>








                      </ul>

                    </aside>

                  </div>
                </div>
                <div class="flex flex-col w-full h-full mx-5 px-4 py-8 overflow-y-auto border-r bg-stone-50 rounded-lg ">
                @yield('container')
                </div>

            <div class="z-10">
                @yield('footer')
            </div>
        </div>
    </div>
</body>
</html>
