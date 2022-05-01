@extends('layout.Layout_Guru')

@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarguru')
@endsection

@section('content')

    <h1>hai Guru</h1>
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

