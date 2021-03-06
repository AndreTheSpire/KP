@extends('layout.Layout_Guru')

@section('title')
    Member {{$dataKelas->kelas_nama}}
@endsection

@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarkelas')
@endsection

@section('content')
<div class="py-5 rounded bg-white">
    <div class="items-center px-8 text-2xl text-bold ">
        Pengajar
    </div>
</div>
<hr class="bold border-black">
<div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center w-full bg-white p-8">

    <div class="w-8 h-8 overflow-hidden rounded-full">
        <img class="w-full h-full object-cover" src="/upload/{{$dataKelas->Guru->PunyaUser->pengguna_photo}}" >
    </div>

      <div class="ml-2 capitalize flex ">
        {{$dataKelas->Guru->PunyaUser->pengguna_nama}}
      </div>

</div>

<div class="py-5 mt-5 rounded bg-white">
    <div class="flex justify-between">
        <div class="items-center px-8 text-2xl text-bold ">
            Siswa
        </div>
        <div class="items-center px-8 text-xl text-bold ">
            {{count($dataMurid)}} Siswa
        </div>
    </div>

</div>
<hr class="bold border-black">
@foreach ($dataMurid as $murid)

    <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center w-full bg-white px-8 py-4">

        <div class="w-8 h-8 overflow-hidden rounded-full">
            <img class="w-full h-full object-cover" src="/upload/{{$murid->punyaUser->pengguna_photo}}" >
        </div>

          <div class="ml-2 capitalize flex ">
            {{$murid->punyaUser->pengguna_nama}}
          </div>
    </div>

@endforeach

@endsection
@section('footer')

@endsection
