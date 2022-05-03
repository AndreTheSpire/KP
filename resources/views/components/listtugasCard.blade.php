<div class="bg-white rounded-md p-2 lg:p-4 dark:bg-ocean-light dark:bg-opacity-75 my-5">
    @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
    <a href="/guru/kelas/{{$kelas_id}}/tugas/{{$tugas_id}}" class="href">
    @else
    <a href="/murid/kelas/{{$kelas_id}}/tugas/{{$tugas_id}}" class="href">
    @endif
        <div class=" flex justice-between">
            <div class="menu-btn focus:outline-none focus:shadow-outline items-center w-full bg-white p-5 grid grid-cols-12">

                <div class="col-span-1">
                    <div class="w-10 h-10 overflow-hidden rounded-full bg-center border-2">
                        <img class="mx-auto w-4/6 h-4/6 object-cover" src="{{ asset('image/task.png') }}" >
                    </div>
                </div>

                <div class=" capitalize flex justify-between col-span-11">
                        <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{$tugas_nama}}</h1>
                        <h1 class="text-sm text-gray-600 m-0 p-0 leading-none ">diposting {{$tugas_waktu}}</h1>
                </div>

            </div>
        </div>

    </a>



</div>

