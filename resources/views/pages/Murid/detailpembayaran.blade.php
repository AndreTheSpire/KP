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


<form class="w-full" action={{url("/murid/dokirimbuktitf/$datadetail->pendaftaranmurid_id")}} method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex items-center mb-3 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4 text-2xl text-black" for="inline-full-name">
            Detail Pembayaran
          </label>
        </div>
      </div>
      <hr class="border-2 mb-3">
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-id">
            ID Registrasi
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-id" type="text" value="{{$datadetail->pendaftaranmurid_id}}">
        </div>
      </div>
    <div class="flex items-center mb-6 w-full">
      <div class="w-1/4">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
          Nama lengkap
        </label>
      </div>
      <div class="w-3/4">
        <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$datadetail->punyaUser->pengguna_nama}}">
      </div>
    </div>
    <div class="flex items-center mb-6 w-full">
      <div class="w-1/4">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-email">
          Email
        </label>
      </div>
      <div class="w-3/4">
        <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="text" value="{{$datadetail->punyaUser->pengguna_email}}">
      </div>
    </div>
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-pelajaran">
            Pelajaran
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-pelajaran" type="text" value="{{$datadetail->punyaPelajaran->pelajaran_nama}}">
        </div>
    </div>
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-kategori">
            Kategori
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-kategori" type="text" value="{{$datadetail->punyaKategori->kategorikelas_nama}}">
        </div>
    </div>
    @php
    $status="";
        if ($datadetail->pendaftaranmurid_status==-1){
            $status="Belum Membayar";
        }
        elseif ($datadetail->pendaftaranmurid_status==0){
            $status="Menunggu Konfirmasi";
        }
        else if ($datadetail->pendaftaranmurid_status==1){
            $status="Gagal Mendaftar";
        }
        else if ($datadetail->pendaftaranmurid_status>=2){

            $status="Sukses Mendaftar";
        }
    @endphp

    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-status">
            status pendaftaran
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $status == "Belum Membayar" ? "text-yellow-600" : " " }} {{ $status === "Menunggu Konfirmasi" ? "text-blue-600" : " " }} {{ $status === "Sukses Mendaftar" ? "text-green-600" : " " }} {{ $status === "Gagal Mendaftar" ? "text-red-600" : " " }}" id="inline-buktitf" type="text" value="{{$status}}">
        </div>
    </div>
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-buktitf">
            Bukti pembayaran
          </label>
        </div>
        <div class="w-3/4">
          <input {{ $datadetail->pendaftaranmurid_status==-1 ? '' : 'disabled' }} class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-buktitf" type="file" name="pendaftaranmurid_buktibayar" value="{{$datadetail->pendaftaranmurid_buktibayar}}">
        </div>
    </div>
    {{-- <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3"></div>
      <label class="md:w-2/3 block text-gray-500 font-bold">
        <input class="mr-2 leading-tight" type="checkbox">
        <span class="text-sm">
          Send me your newsletter!
        </span>
      </label>
    </div> --}}
    <div class="md:flex md:items-center">
      <div class="md:w-1/3"></div>
      <div class="md:w-2/3">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
          Kirim bukti Tranfer
        </button>
      </div>
    </div>
  </form>




@endsection
@section('footer')

@endsection
