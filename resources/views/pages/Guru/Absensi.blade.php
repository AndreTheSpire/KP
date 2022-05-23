@extends('layout.Layout_Guru')

@section('title')
    Absensi {{$dataKelas->kelas_nama}}
@endsection

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

<form action="/guru/kelas/{{$dataKelas->kelas_id}}/absensi/update" class="mx-5" method="POST">
    @csrf
<div class="overflow-x-auto">
<table class="table-fixed border-collapse border border-slate-700 w-full  shrink-0">
    <thead>
        <tr >
            <th class="border border-slate-600 text-center w-32">Nama Murid</th>
            @for ($i=0;$i<$dataKelas->kategori->kategorikelas_pertemuan;$i++)
            <th class="border border-slate-600 text-center w-32">Minggu {{$i+1}}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @for ($i=0;$i< sizeOf($dataMurid);$i++)
        <tr>
            <th class="border border-slate-600 text-center w-32 p-4">{{$dataMurid[$i]->punyaUser->pengguna_nama}}</th>

            @foreach ($dataAbsensi as $d)
            @if ($d->murid_id==$dataMurid[$i]->murid_id)
            <td class="border border-slate-600 text-center w-32 p-4"><input type="checkbox" class="w-6 h-6 bg-red-600 text-white border-0 rounded-md focus:ring-0" name="read[]" id="" value={{$d->absen_id}}
                @if ($d->status_absen==1)
                checked
                @endif></td>
            @endif
            @endforeach
            </tr>
        @endfor

    </tbody>
</table>
</div>
<div class="px-2 py-1">
    {{-- <input type="hidden" name="id_murid" value="{{$filter_murid}}">
    <input type="hidden" name="id_kelas" value="{{$id_kelas_sekarang}}"> --}}
    <button type="submit" class="bg-red-600 text-white float-right text-black py-2 px-1 px-4 w-auto md:w-1/4 bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline rounded-lg text-xl">save</button>
</div>


</form>

<style>
    label {
      top: 0%;
      transform: translateY(-50%);
      font-size: 15px;
      color: rgb(4, 7, 13);
    }
    .empty input:not(:focus) + label {
      top: 50%;
      transform: translateY(-50%);
      font-size: 14px;
    }
    input:not(:focus) + label {
      color: rgba(70, 70, 70, 1);
    }
    input {
      border-width: 1px;
    }
    input:focus {
      outline: none;
      border-color: rgba(37, 99, 235, 1);
    }
    </style>

@endsection
@section('footer')

@endsection
