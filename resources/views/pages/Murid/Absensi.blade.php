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
            <th class="border border-slate-600 text-center w-full">Minggu</th>
            <th class="border border-slate-600 text-center w-full">Absensi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataAbsensi as $d)
        <tr>
            <td class="border border-slate-600 text-center w-full p-4">{{$d->minggu}}</th>
                @if ($d->status_absen==0)
                <td class="border border-slate-600 text-center w-full p-4">X</th>
                @else
                <td class="border border-slate-600 text-center w-full p-4">V</th>
                @endif

        </tr>
        @endforeach


    </tbody>
</table>

@endsection
@section('footer')

@endsection
