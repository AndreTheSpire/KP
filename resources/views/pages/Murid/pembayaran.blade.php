@extends('layout.Layout_Murid')

@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('headerfill')
<div class="ml-6 md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 bg-gray-100 flex flex-row flex-wrap">
    <div class="flex-1 pl-4 text-3xl text-bold">Pembayaran</div>
    <div class="border-2">
        <input type="text" name="" id="" placeholder="Search">
        <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>

    </div>

</div>

@endsection

@section('sidebar')
    @include('pages.essential.sidebarpembayaran')
@endsection

@section('content')


<table class="table-fixed border-collapse border border-slate-700 w-full">
    <thead>
        <tr >
            <th class="border border-slate-600 text-center w-full">ID Pendaftaran</th>
            <th class="border border-slate-600 text-center w-full">Nama Pelajaran</th>
            <th class="border border-slate-600 text-center w-full">Nama Kategori</th>
            <th class="border border-slate-600 text-center w-full">status</th>
            <th class="border border-slate-600 text-center w-full">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datapendaftaran as $k)
        <tr>
            <td class="border border-slate-600 text-center w-full">{{$k->pendaftaranmurid_id}}</td>
            {{-- @dd($k->PunyaPelajaran()); --}}
            <td class="border border-slate-600 text-center w-full">{{$k->PunyaPelajaran->pelajaran_nama}}</td>
            <td class="border border-slate-600 text-center w-full">{{$k->punyaKategori->kategorikelas_nama}}</td>
            @if ($k->pendaftaranmurid_status==-1)
            <td class="border border-slate-600 text-center w-full">Belum Membayar</td>
            @elseif ($k->pendaftaranmurid_status==0)
            <td class="border border-slate-600 text-center w-full">Menunggu Konfirmasi</td>
            @elseif ($k->pendaftaranmurid_status==1)
            <td class="border border-slate-600 text-center w-full">Pembayaran Sukses</td>
            @elseif ($k->pendaftaranmurid_status==2)
            <td class="border border-slate-600 text-center w-full">Pembayaran Gagal</td>
            @elseif ($k->pendaftaranmurid_status==3)
            <td class="border border-slate-600 text-center w-full">Sukses Masuk Kelas</td>
            @endif
            <td class="border border-slate-600 text-center w-full"><a href="/murid/detailpembayaran/{{$k->pendaftaranmurid_id}}"><button class="bg-orange-600 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded-full" type="button">Detail</button></a></td>


        </tr>

        @endforeach
    </tbody>
</table>

@endsection
@section('footer')

@endsection
