@extends('layout.Layout_Murid')

@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarmurid')
@endsection

@section('content')

    <h1>hai user</h1>
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
