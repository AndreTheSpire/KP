@extends('layout.layout_Murid')

@section('title')
    To-Do
@endsection

@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('content')

<div class="w-full flex justify-center items-center">
    <div class="w-3/4 ">
        <div class="pt-5 pb-10 rounded bg-white">
            <div class="items-center px-8 text-xl text-bold ">
                Daftar Tugas
            </div>
        </div>


        @foreach ($dataTugas as $tugas)

        @if ($tugas->DariTugas->tanggat_waktu>= \Carbon\Carbon::now())
        @include('components.listtugasCard',
        [

            'tugas_id'=>$tugas->DariTugas->tugas_id,
            'kelas_id'=>$tugas->DariTugas->kelas_id,
            'tugas_nama'=>$tugas->DariTugas->tugas_nama,
            'tugas_waktu'=>date('d M Y', strtotime($tugas->DariTugas->created_at)),
        ])

        @endif
        @endforeach

    </div>
</div>



@endsection
@section('footer')

@endsection
