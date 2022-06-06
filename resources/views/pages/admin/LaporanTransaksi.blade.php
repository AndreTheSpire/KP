@extends('layout.layout_admin')
@section('container')

    <div class="flex justify-between">
        <div></div>
        <div class="mb-3 xl:w-96">
            <form action="/admin/searchlaporan" method="get">
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
    <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-center">
                <thead class="border-b bg-gray-800">
                  <tr>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">No Registrasi</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Pendaftar</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Pelajaran</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Kategori</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Biaya</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Bukti Tanfer</th>
                  </tr>
                </thead class="border-b">
                <tbody>
                    @if(count($datalaporan)==0)
                    <tr>

                        <td colspan="6" class="px-6 py-4 border border-slate-200 whitespace-nowrap text-sm font-medium text-gray-900">Tidak ada Data</td>
                    </tr>
                    @else
                    @foreach ($datalaporan as $d)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$d->pendaftaranmurid_id}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">{{$d->PunyaUser->pengguna_nama}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">{{$d->PunyaPelajaran->pelajaran_nama}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">{{$d->PunyaKategori->kategorikelas_nama}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">Rp. {{ number_format($d->PunyaKategori->kategorikelas_harga, 2) }}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">
                                @if($d->pendaftaranmurid_buktibayar=="kosong")
                                <a href="{{ url("/downloadbuktitf/$d->pendaftaranmurid_id") }}">
                                    Tidak ada File
                                </a>
                                @else
                                <a href="{{ url("/downloadbuktitf/$d->pendaftaranmurid_id") }}">
                                    <button class="bg-red-500 hover:bg-gray-700 text-white py-2 px-4 mx-4 rounded">
                                        Download
                                    </button>
                                </a>
                                @endif

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

    <style>
        dialog[open] {
            animation: appear .15s cubic-bezier(0, 1.8, 1, 1.8);
        }

        dialog::backdrop {
          background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(54, 54, 54, 0.5));
          backdrop-filter: blur(3px);
        }


      @keyframes appear {
        from {
          opacity: 0;
          transform: translateX(-3rem);
        }

        to {
          opacity: 1;
          transform: translateX(0);
        }
      }
    </style>

@endsection
