@extends('layout.Layout_Murid')

@section('navbar')
    @include('pages.essential.navbarmurid')
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



<table class="table-fixed border-collapse border border-slate-700 w-full">
    <thead>
        <tr >
            <th class="border border-slate-600 text-center w-full">No</th>
            <th class="border border-slate-600 text-center w-full">Nama Tugas</th>
            <th class="border border-slate-600 text-center w-full">Nilai</th>
        </tr>
    </thead>
    <tbody>
        @php
        $x=0;
         @endphp
        @foreach ($dataTugasmurid as $d)
        @php
            $x++;
        @endphp
        <tr>
            <td class="border border-slate-600 text-center w-full p-4">{{$x}}</th>

                <td class="border border-slate-600 text-center w-full p-4">{{$d->DariTugas->tugas_nama}}</th>

                <td class="border border-slate-600 text-center w-full p-4">{{$d->nilai}}</th>


        </tr>
        @endforeach


    </tbody>
</table>

@endsection
@section('footer')

@endsection
