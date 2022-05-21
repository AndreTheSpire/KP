@extends('layout.Layout_Murid')

@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('headerfill')
<div class="ml-6 md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 bg-gray-100 flex flex-row flex-wrap">
    <div class="flex-1 pl-4 text-3xl text-bold">Pembayaran</div>

        <form action="/murid/pembayaran/{{$title}}" method="get">
            @csrf
            <div class="input-group relative flex flex-wrap items-stretch mb-4 rounded">
                <input type="search" name="search" id="nama" value="" class="form-control relative flex-auto min-w-48 block px-7 mx-1 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                <button type="submit" class="btn inline-block px-6 mx-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                </button>
            </div>
        </form>



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
            <td class="border border-slate-600 text-center w-full">Pembayaran Gagal</td>
            @elseif ($k->pendaftaranmurid_status>=2)
            <td class="border border-slate-600 text-center w-full">Pembayaran Sukses</td>
            @endif
            <td class="border border-slate-600 text-center w-full"><a href="/murid/detailpembayaran/{{$k->pendaftaranmurid_id}}"><button class="bg-orange-600 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded-full" type="button">Detail</button></a></td>


        </tr>

        @endforeach
    </tbody>
</table>

@endsection
@section('footer')

@endsection
