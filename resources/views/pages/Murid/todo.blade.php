@extends('layout.Layout_Murid')

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

        @php
            $x=0;
        @endphp
        @foreach ($dataTugas as $tugas)

        @if ($tugas->DariTugas->tanggat_waktu>= \Carbon\Carbon::now())
        @php
            $x++;
        @endphp
        @include('components.listtugasCard',
        [

            'tugas_id'=>$tugas->DariTugas->tugas_id,
            'kelas_id'=>$tugas->DariTugas->kelas_id,
            'tugas_nama'=>$tugas->DariTugas->tugas_nama,
            'tugas_waktu'=>date('d M Y', strtotime($tugas->DariTugas->created_at)),
        ])

        @endif
        @endforeach
        @if ($x==0)
        <div class="bg-white rounded-md p-2 lg:p-4 dark:bg-ocean-light dark:bg-opacity-75 my-5">
                <div class=" flex justice-center">
                    <div class="menu-btn focus:outline-none focus:shadow-outline items-center w-full bg-white p-5 grid grid-cols-1 text-2xl text-center">

                       Tidak Ada Tugas

                    </div>
                </div>





        </div>
        @else

        @endif

    </div>
</div>



@endsection
@section('footer')

@endsection
