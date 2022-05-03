@extends('layout.Layout_Guru')

@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarkelas')
@endsection

@section('content')
<div class="pt-5 pb-10 rounded bg-white">
    <div class="items-center px-8 text-xl text-bold ">
        {{$dataKelas->kelas_nama}}
    </div>
</div>

@foreach ($dataTugas as $tugas)
@include('components.listtugasCard',
[
    'tugas_id'=>$tugas->tugas_id,
    'kelas_id'=>$tugas->kelas_id,
    'tugas_nama'=>$tugas->tugas_nama,
    'tugas_waktu'=>date('d M Y', strtotime($tugas->created_at)),
])
@endforeach

@endsection
@section('footer')

@endsection
