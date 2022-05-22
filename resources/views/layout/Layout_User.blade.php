<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('image/cettatf.png') }}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com/"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Home</title>
</head>
<body class="" id="body">
    @include('sweetalert::alert')
    <div class="bg-ocean-light dark:bg-ocean-dark bg-opacity-75 flex flex-col items-center ">
        <div class="min-h-screen  flex flex-col justify-between lg:w-5/6">
            <div class="z-20">
                @yield('navbar')
            </div>
            <div class="flex bg-ocean-light dark:bg-ocean-dark h-screen my-5">
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
                        <li class="border-2 border-rose-600"> <span class=" mx-3 my-2 text-xl"> Kelas ku</span> <button class="border-2 border-rose-600 text-blue px-3 text-lg font-bold rounded text-center float-right"  onclick="document.getElementById('myModal').showModal()">+</button> </li>
                        @foreach ($datakelasmurid as $d)
                        <li>
                            <a class="flex items-center px-4 py-2 text-gray-700 rounded-md " href="/admin">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>

                              <span class="mx-4 font-medium">kelas1</span>
                              {{-- <span class="font-medium text-white bg-red-600 content-center w-7 h-7 rounded-full">99</span> --}}
                            </a>
                          </li>
                        @endforeach
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

    <style>
        dialog[open] {
            animation: appear .15s cubic-bezier(0, 1.8, 1, 1.8);
        }

        dialog::backdrop {
          background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(54, 54, 54, 0.5));
          backdrop-filter: blur(3px);
        }


      @keyframes appear {
        from {
          opacity: 0;
          transform: translateX(-3rem);
        }

        to {
          opacity: 1;
          transform: translateX(0);
        }
      }
    </style>

    <dialog id="myModal" class="w-11/12 md:w-1/2 p-5  bg-white rounded-md ">


        <div class="flex w-full h-auto justify-end items-center">
            <div class="flex flex-row w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                    Daftar kelas
            </div>
            <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>
                <form action={{url("/murid/dodaftarmurid")}} method="POST">
                    @csrf
                    <div class="mt-4">
                        <div>
                            <label class="block" for="Name">Name<label>
                                    <input type="text" placeholder="Name"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" disabled="disabled" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}">
                        </div>
                        <div class="mt-4">
                            <label class="block" for="email">Email<label>
                                    <input type="text" placeholder="Email"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" disabled="disabled" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_email}}">
                        </div>
                        <input type="hidden" name="pengguna_id"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_id}}">
                        <div class="mt-4">
                            <label class="block">Pelajaran<label>
                                    <select id="pelajaran_id" name="pelajaran_id"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" onchange="getIndex()">
                                        <option value="0">Pilih Pelajaran</option>
                                        @foreach ($dataPelajaran as $d)
                                        <option value="{{$d->pelajaran_id}}">{{$d->pelajaran_nama}}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="mt-4">
                            <label class="block">Kategori<label>
                                    <select id="kategorikelas_id" name="kategorikelas_id"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >

                                    </select>
                        </div>

                        <div class="flex">
                            <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Daftar
                                Kelas</button>
                        </div>

                    </div>
                </form>


        {{-- <div class="flex flex-col w-full h-auto ">
            <div class="flex w-full h-auto justify-end items-center">
                <div class="flex flex-row w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                        Tambah Pelajaran
                </div>
                <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </div>
            </div>
            <form action={{url("/admin/tambahpelajaran")}} method="POST">
                @csrf
                <div class="flex w-full py-10 px-2 justify-center items-center rounded text-center text-gray-500">
                    <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-6">
                        <label for="pelajaran_nama">Nama Pelajaran</label>
                        <input type="text" name="pelajaran_nama" id="pelajaran_nama" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('pelajaran_nama')}}" />
                        </div>
                        <div class="md:col-span-6 text-right">
                            <div class="inline-flex items-endt">
                                <button type="submit" class="bg-secondary-red hover:bg-secondary-red-hover text-black font-bold py-2 px-4 rounded">Submit</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div> --}}
    </dialog>
    <script>

        // $('#pelajaran_id').on('change', function () {
        //     console.log("masuk gak tuh!!!");
        //     getIndex();
        // });

    const getIndex= ()=>{
        console.log("masuk sini oii");
        var e = document.getElementById("pelajaran_id");
        var result = e.options[e.selectedIndex].value;
    $.ajax({
        type : 'get',
        url : '/dependantkategori/'+result,
        success : function(data){
            $('#kategorikelas_id').empty();
            data = JSON.parse(data);
            // console.log(data);
            for (i = 0; i < data.length; i++) {
            console.log(data[i].kategorikelas_nama);
            $('#kategorikelas_id').append(new Option(data[i].kategorikelas_nama, data[i].kategorikelas_id))
            }
            // $('#kategorikelas_id').empty();
            // console.log(data);
            // $(data).each(function(x,y){
            //     console.log(y);
            //     $('#kategorikelas_id').append(new Option(y.kategorikelas_nama, y.kategorikelas_id))

            // });
        },
    });
    $.ajax({
        type : 'get',
        url : '/dependantguru/'+result,
        success : function(data){
            $('#guru_kelas').empty();
            data = JSON.parse(data);
             console.log(data);
            for (i = 0; i < data.length; i++) {
            console.log(data[i].punya_user.pengguna_nama);
            $('#guru_kelas').append(new Option(data[i].punya_user.pengguna_nama, data[i].punya_user.pengguna_id))
            }
            // $('#kategorikelas_id').empty();
            // console.log(data);
            // $(data).each(function(x,y){
            //     console.log(y);
            //     $('#kategorikelas_id').append(new Option(y.kategorikelas_nama, y.kategorikelas_id))

            // });
        },
    });
}
    </script>
</body>
</html>
