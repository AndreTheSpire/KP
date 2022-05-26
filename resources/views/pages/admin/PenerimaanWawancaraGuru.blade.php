@extends('layout.layout_admin')
@section('container')


    <div class="font-bold text-center text-2xl">Daftar Wawancara Guru Yang Mendaftar</div>
    <div class="flex items-center justify-center p-10 border-4 border-dotted ">

        <div class="flex flex-col w-full">
            <div class="overflow-x-auto">
              <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full text-center">
                    <thead class="border-b bg-gray-800">
                      <tr>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Nama Guru</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Email Guru</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Tanggal Lahir</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Detail</th>
                    </tr>
                    </thead class="border-b">
                    <tbody>
                        @if(count($data_guru)==0)
                        <tr>

                            <td colspan="4" class="px-6 py-4 border border-slate-200 whitespace-nowrap text-sm font-medium text-gray-900">Tidak ada Data</td>
                        </tr>
                        @else
                        @foreach ($data_guru as $data_daftar_guru)
                        <tr>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$data_daftar_guru->pengguna_nama}}</td>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$data_daftar_guru->pengguna_email}}</td>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{date('d-m-Y', strtotime($data_daftar_guru->pengguna_tanggallahir))}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">
                                <a href="/admin/detailwawancaraguru/{{$data_daftar_guru->pengguna_id}}">
                                    <button class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 mx-4 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
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
    </div>




@endsection
