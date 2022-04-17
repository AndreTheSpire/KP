@extends('layout.Layout_Murid')

@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarkelas')
@endsection

@section('content')
<div class="pt-5 pb-10 rounded bg-white">
<div class="items-center pr-6 pl-6 text-3xl text-bold ">
    {{$dataKelas->kelas_nama}}
</div>
<div class="items-center pr-6 pl-6  text-xl text-bold ">
    {{$dataKelas->Guru->punyaUser->pengguna_nama}} | {{$dataKelas->Pelajaran->pelajaran_nama}}
</div>
</div>
data kelas




@endsection
@section('footer')

@endsection
