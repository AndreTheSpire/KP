@extends('layout.layout_Guru')
@section('title')
   Notifikasi
@endsection

@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarguru')
@endsection

@section('content')


    @foreach ($dataNotifikasi as $notif)
    @include('components.NotifikasiCard',
    [
        'tugas_id'=>$notif->punyaTugas->tugas_id,
        'kelas_id'=>$notif->punyaKelas->kelas_id,
        'tugas_nama'=>$notif->punyaTugas->tugas_nama,
        'kelas_nama'=>$notif->punyaKelas->kelas_nama,
    ])
    @endforeach


@endsection
@section('footer')

@endsection

