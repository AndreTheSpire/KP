@extends('layout.layout_admin')
@section('container')
    <div class="flex justify-between">
        <a href="/admin/kelas/buatkelas">
        <button class="btn inline-block h-10 w-auto px-6 mx-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out flex items-center">
            Pembuatan Kelas
        </button>
    </a>
        <div class="mb-3 xl:w-96">
            <form action="/admin/searchKelas" method="get">
                @csrf
                <div class="input-group relative flex flex-wrap items-stretch mb-4 rounded">
                    <input type="search" name="namakelas" id="nama" value="" class="form-control relative flex-auto min-w-48 block px-7 mx-1 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-red-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
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
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">No.</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Nama Kelas</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Waktu awal</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Waktu akhir</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Guru</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Action</th>
                  </tr>
                </thead class="border-b">
                <tbody>
                    @if(count($dataKelas)==0)
                    <tr>

                        <td colspan="4" class="px-6 py-4 border border-slate-200 whitespace-nowrap text-sm font-medium text-gray-900">Tidak ada Data</td>
                    </tr>
                    @else
                    @foreach ($dataKelas as $d)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$d->kelas_id}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">{{$d->kelas_nama}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">{{date('D H:i', strtotime($d->waktu_mulai))}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">{{date('D H:i', strtotime($d->waktu_selesai))}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">{{$d->Guru->punyaUser->pengguna_nama}}</td>

                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">
                                <a href="/admin/kelas/{{$d->kelas_id}}/">
                                    <button class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 mx-4 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                </a>
                                <a href="/admin/kelas/{{$d->kelas_id}}/penetapan">
                                    <button class="bg-indigo-500 hover:bg-indigo-700 text-white py-2 px-4 mx-4 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
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

@endsection
