@extends('layout.Layout_Murid')

@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('content')
<div class="flex flex-col md:flex-row gap-2">
    <div class="flex flex-row flex-wrap my-2 m-1 lg:mx-auto">
        @foreach ($dataMurid as $m)
            {{-- @php
                if($kelas->pengguna_id!=0){
                    $penggunanama=$kelas->Guru->pengguna_nama;
                }else{
                    $penggunanama="belum ada guru";
                }
            @endphp --}}
                @include('components.kelasCard',
                [
                    'kelas_id'=>$m->punyaKelas->kelas_id,
                    'kelas_nama'=>$m->punyaKelas->kelas_nama,
                    'kelas_deskripsi'=>$m->punyaKelas->kelas_deskripsi,
                    'kelas_guru'=>$m->punyaKelas->Guru->PunyaUser->pengguna_nama,
                    "waktuAwal"=>date('D H:i', strtotime($m->punyaKelas->waktu_mulai)),
                    "waktuAkhir"=>date('D H:i', strtotime($m->punyaKelas->waktu_selesai)),
                ])
            @endforeach




@endsection
@section('footer')

@endsection
