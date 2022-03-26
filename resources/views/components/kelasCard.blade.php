
    <div class="xl:w-1/3 sm:w-full md:w-1/2  ">
        <a href='/admin/kelas/{{$kelas_id}}/'>
            <div class="bg-white m-2 shadow-lg rounded-md ">
                <div class=" h-32 overflow-hidden rounded-t-md" >
                    <img class="w-full" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="" />
                </div>
                <div class="text-center px-2 py-4">
                    <h2 class="text-gray-800 text-3xl font-bold">{{$kelas_nama}}</h2>
                    <p class="text-gray-400 mt-2 mb-2">zonk</p>
                    <p class="text-black mt-2 mb-2">{{$waktuAwal ." - ". $waktuAkhir}}</p>
                    <hr>
                    <p class="mt-2 text-gray-600">{{$kelas_deskripsi}}</p>
                </div>
            </div>
    </a>
    </div>


