@extends('layout.Layout_Guru')

@section('navbar')
    @include('pages.essential.navbarguru')
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

<div class="mt-5">
    <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center w-full bg-white p-5">
        <div class="w-8 h-8 overflow-hidden rounded-full">
          <img class="w-full h-full object-cover" src="{{ asset('image/user.svg') }}" >
        </div>

        <div class="ml-4 capitalize flex cursor-text focus:cursor-auto ">

          <h1 class="text-sm text-gray-500 m-0 p-0 leading-none" onclick="document.getElementById('myModal2').showModal()"> Mulai diskusi,berbagi informasi, dan lain-lain</h1>
        </div>
    </div>
</div>
@foreach ($dataFeed as $feed)
@include('components.feedCard',
[
    'feed_id'=>$feed->feed_id,
    'feed_creator'=>$feed->pengirim->pengguna_nama,
    'keterangan'=>$feed->keterangan,
    'feed_waktu'=>date('d M Y, H:i', strtotime($feed->created_at)),
    'feed_lampiran'=>$feed->lampiran,
    'dataComment'=>$feed->Comment(),
])
@endforeach



@endsection
@section('footer')

@endsection
