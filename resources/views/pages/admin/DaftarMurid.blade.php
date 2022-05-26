@extends('layout.layout_admin')
@section('container')


<div class="flex justify-between">
    <div></div>
    <div class="mb-3 xl:w-96">
        <form action="/admin/searchmurid" method="get">
            @csrf
            <div class="input-group relative flex flex-wrap items-stretch mb-4 rounded">
                <input type="search" name="laporan" id="nama" value="" class="form-control relative flex-auto min-w-48 block px-7 mx-1 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-red-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                <button type="submit" class="btn inline-block px-6 mx-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
  </div>
<div class="flex items-center justify-center p-10 border-4 border-dotted ">


        <div class="flex flex-col w-full">
            <div class="overflow-x-auto">
              <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full text-center">
                    <thead class="border-b bg-gray-800">
                      <tr>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Nama</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Email</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Alamat</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Detail</th>
                    </tr>
                    </thead class="border-b">
                    <tbody>
                        @if(count($datamurid)==0)
                        <tr>

                            <td colspan="5" class="px-6 py-4 border border-slate-200 whitespace-nowrap text-sm font-medium text-gray-900">Tidak ada Data</td>
                        </tr>
                        @else
                        @foreach ($datamurid as $k)
                        <tr>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$k->pengguna_nama}}</td>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$k->pengguna_email}}</td>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$k->pengguna_alamat}}</td>

                            {{-- <td class="border border-slate-600 text-center w-full"><a href="/admin/murid/{{$k->pendaftaranmurid_id}}"><button class="bg-orange-600 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded-full" type="button">Detail</button></a></td> --}}
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">
                                <a href="/admin/detailmurid/{{$k->pengguna_id}}">
                                    <button class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 mx-4 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>


    {{-- <table class="table-fixed border-collapse border border-slate-500 w-4/5">
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
                <td class="border border-slate-600 text-center w-full">Berhasil masuk kelas</td>
                @endif
                <td class="border border-slate-600 text-center w-full"><a href="/admin/murid/{{$k->pendaftaranmurid_id}}"><button class="bg-orange-600 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded-full" type="button">Detail</button></a></td>


            </tr>

            @endforeach
        </tbody>
    </table> --}}
</div>


@endsection
