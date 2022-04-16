@extends('layout.Layout_Murid')

@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarmurid')
@endsection

@section('content')

<table class="table-fixed border-collapse border border-slate-500 w-4/5">
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
            @if ($k->status==-1)
            <td class="border border-slate-600 text-center w-full">Belum Membayar</td>
            @elseif ($k->status==0)
            <td class="border border-slate-600 text-center w-full">Menunggu Konfirmasi</td>
            @elseif ($k->status==1)
            <td class="border border-slate-600 text-center w-full">Pembayaran Sukses</td>
            @elseif ($k->status==2)
            <td class="border border-slate-600 text-center w-full">Pembayaran Gagal</td>
            @endif
            <td class="border border-slate-600 text-center w-full"><a href="/murid/detailpembayaran/{{$k->pendaftaranmurid_id}}"><button class="bg-orange-600 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded-full" type="button">Detail</button></a></td>


        </tr>

        @endforeach
    </tbody>
</table>

@endsection
@section('footer')

@endsection
