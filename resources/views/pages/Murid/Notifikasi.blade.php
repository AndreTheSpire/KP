@extends('layout.layout_Murid')

@section('title')
    Notifikasi
@endsection

@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarmurid')
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

