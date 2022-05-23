@extends('layout.layout_admin')


@section('container')


<div class="w-full">
    @csrf
    <div class="flex items-center mb-3 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4 text-2xl text-black" for="inline-full-name">
            Detail Pembayaran
          </label>
        </div>
      </div>
      <hr class="border-2 mb-3">
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-id">
            ID Registrasi
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-id" type="text" value="{{$datadetail->pendaftaranmurid_id}}">
        </div>
      </div>
    <div class="flex items-center mb-6 w-full">
      <div class="w-1/4">
        <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
          Nama lengkap
        </label>
      </div>
      <div class="w-3/4">
        <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$datadetail->punyaUser->pengguna_nama}}">
      </div>
    </div>
    <div class="flex items-center mb-6 w-full">
      <div class="w-1/4">
        <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-email">
          Email
        </label>
      </div>
      <div class="w-3/4">
        <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="text" value="{{$datadetail->punyaUser->pengguna_email}}">
      </div>
    </div>
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-pelajaran">
            Pelajaran
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-pelajaran" type="text" value="{{$datadetail->punyaPelajaran->pelajaran_nama}}">
        </div>
    </div>
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-kategori">
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
        else if ($datadetail->pendaftaranmurid_status==0){
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
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-status">
            status pendaftaran
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $status == "Belum Membayar" ? "text-yellow-600" : " " }} {{ $status === "Menunggu Konfirmasi" ? "text-blue-600" : " " }} {{ $status === "Sukses Mendaftar" ? "text-green-600" : " " }} {{ $status === "Gagal Mendaftar" ? "text-red-600" : " " }}" id="inline-buktitf" type="text" value="{{$status}}">
        </div>
    </div>
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-buktitf">
            Bukti pembayaran
          </label>
        </div>
        <div class="w-3/4">
            <a href="{{ url("/murid/downloadbuktitf/$datadetail->pendaftaranmurid_id") }}">
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold font-bold h-6 px-4 m-2 rounded inline-flex items-center">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                <span>Download</span>
            </button>
            </a>
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
    <label class="flex justify-center text-2xl font-bold">Apakah anda menerima {{$datadetail->punyaUser->pengguna_nama}} sebagai murid ?</label><br>
        <div class="flex justify-center">
            <a href="{{ url("admin/murid/$datadetail->pendaftaranmurid_id/confirm") }}" >
            <button class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 mx-4 rounded" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </button>
            </a>
            <a href="{{ url("admin/murid/$datadetail->pendaftaranmurid_id/decline") }}">
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </a>
        </div>
    </div>




@endsection
@section('footer')

@endsection
