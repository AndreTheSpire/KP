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

<form action="/guru/kelas/{{$dataKelas->kelas_id}}/absensi/update" class="mx-5" method="POST">
    @csrf

<table class="table-fixed border-collapse border border-slate-700 w-full">
    <thead>
        <tr >
            <th class="border border-slate-600 text-center w-full">Nama Murid</th>
            @for ($i=0;$i<$dataKelas->kategori->kategorikelas_pertemuan;$i++)
            <th class="border border-slate-600 text-center w-full">Minggu {{$i+1}}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @for ($i=0;$i< sizeOf($dataMurid);$i++)
        <tr>
            <th class="border border-slate-600 text-center w-full p-4">{{$dataMurid[$i]->punyaUser->pengguna_nama}}</th>

            @foreach ($dataAbsensi as $d)
            @if ($d->murid_id==$dataMurid[$i]->murid_id)
            <td class="border border-slate-600 text-center w-full p-4"><input type="checkbox" class="w-6 h-6 text-green-600 border-0 rounded-md focus:ring-0" name="read[]" id="" value={{$d->absen_id}}
                @if ($d->status_absen==1)
                checked
                @endif></td>
            @endif
            @endforeach
            </tr>
        @endfor

    </tbody>
</table>
<span class=" ml-2 w-50"><button type="submit"  name="tambahbarang" class=" p-2 bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500">Save </button></span>


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
