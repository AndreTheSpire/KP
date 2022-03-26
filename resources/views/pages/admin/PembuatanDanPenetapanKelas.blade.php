@extends('layout.Layout_admin')
@section('container')

    <h1 class="mx-2">pembuatan dan penetapan kelas</h1>
    <a href="/admin/kelas/buatkelas"><button class="bg-blue-500 hover:bg-blue-700 text-white mx-2 font-bold py-2 px-4 rounded">Buat Kelas</button></a>

    <div class="flex flex-col md:flex-row gap-2">
        <div class="flex flex-row flex-wrap my-2 m-1 lg:mx-auto">
            @foreach ($dataKelas as $kelas)
                @include('components.kelasCard',
                [
                    'kelas_id'=>$kelas->kelas_id,
                    'kelas_nama'=>$kelas->kelas_nama,
                    'kelas_deskripsi'=>$kelas->kelas_deskripsi,
                    "waktuAwal"=>date('D H:i', strtotime($kelas->waktu_mulai)),
                    "waktuAkhir"=>date('D H:i', strtotime($kelas->waktu_selesai)),
                ])
            @endforeach
        </div>
    </div>
@endsection
