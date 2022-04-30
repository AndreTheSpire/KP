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
