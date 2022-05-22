@extends('layout.Layout_Guru')

@section('title')
    Kelas
@endsection

@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('content')
<div class="">
    {{-- <div class="flex flex-row flex-wrap my-2 m-1 lg:mx-auto col-4"> --}}
        <div class="mx-12 text-3xl text-bold">Kelas-ku</div>
        <div class="mx-10 grid grid-cols-3 lg:grid-cols-1 my-2 m-1">

            {{-- <div class="bg-white m-2 shadow-lg rounded-md ">
                <a href='/murid/kelas/x}/ '>
                <div class=" h-32 overflow-hidden rounded-t-md" >
                    <img class="w-full" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="" />
                </div>
                <div class="text-center px-2 py-4">
                    <h2 class="text-gray-800 text-3xl font-bold">a</h2>
                    <p class="text-gray-400 mt-2 mb-2">a</p>
                    <p class="text-black mt-2 mb-2">a</p>
                    <hr>
                    <p class="mt-2 text-gray-600">a</p>
                </div>
            </a>
            </div>
            <div class="bg-white m-2 shadow-lg rounded-md ">
                <a href='/murid/kelas/x}/ '>
                <div class=" h-32 overflow-hidden rounded-t-md" >
                    <img class="w-full" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="" />
                </div>
                <div class="text-center px-2 py-4">
                    <h2 class="text-gray-800 text-3xl font-bold">a</h2>
                    <p class="text-gray-400 mt-2 mb-2">a</p>
                    <p class="text-black mt-2 mb-2">a</p>
                    <hr>
                    <p class="mt-2 text-gray-600">a</p>
                </div>
            </a>
            </div>
            <div class="bg-white m-2 shadow-lg rounded-md ">
                <a href='/murid/kelas/x}/ '>
                <div class=" h-32 overflow-hidden rounded-t-md" >
                    <img class="w-full" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="" />
                </div>
                <div class="text-center px-2 py-4">
                    <h2 class="text-gray-800 text-3xl font-bold">a</h2>
                    <p class="text-gray-400 mt-2 mb-2">a</p>
                    <p class="text-black mt-2 mb-2">a</p>
                    <hr>
                    <p class="mt-2 text-gray-600">a</p>
                </div>
            </a>
            </div> --}}
            {{-- <div class="bg-white m-2 shadow-lg rounded-md ">
                <a href='/murid/kelas/x}/ '>
                <div class=" h-32 overflow-hidden rounded-t-md" >
                    <img class="w-full" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="" />
                </div>
                <div class="text-center px-2 py-4">
                    <h2 class="text-gray-800 text-3xl font-bold">a</h2>
                    <p class="text-gray-400 mt-2 mb-2">a</p>
                    <p class="text-black mt-2 mb-2">a</p>
                    <hr>
                    <p class="mt-2 text-gray-600">a</p>
                </div>
            </a>
            </div> --}}

        @foreach ($dataGuru as $m)

                @include('components.kelasCard',
                [
                    'kelas_id'=>$m->kelas_id,
                    'kelas_nama'=>$m->kelas_nama,
                    'kelas_deskripsi'=>$m->kelas_deskripsi,
                    'kelas_guru'=>Auth::guard('satpam_pengguna')->user()->pengguna_nama,
                    "waktuAwal"=>date('D H:i', strtotime($m->waktu_mulai)),
                    "waktuAkhir"=>date('D H:i', strtotime($m->waktu_selesai)),
                ])
        @endforeach




@endsection
@section('footer')

@endsection
