@extends('layout.Layout_admin')
@section('container')


<div class="font-bold text-center text-2xl">Daftar Murid Yang Mendaftar Kelas</div>
<div class="flex items-center justify-center p-10 border-4 border-dotted ">


        <div class="flex flex-col">
            <div class="overflow-x-auto">
              <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full text-center">
                    <thead class="border-b bg-gray-800">
                      <tr>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">No. Registrasi</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Pelajaran</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Kategori</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Status</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Detail</th>
                    </tr>
                    </thead class="border-b">
                    <tbody>
                        @foreach ($datapendaftaran as $k)
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$k->pendaftaranmurid_id}}</td>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$k->PunyaPelajaran->pelajaran_nama}}</td>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$k->punyaKategori->kategorikelas_nama}}</td>
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
                            {{-- <td class="border border-slate-600 text-center w-full"><a href="/admin/murid/{{$k->pendaftaranmurid_id}}"><button class="bg-orange-600 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded-full" type="button">Detail</button></a></td> --}}
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">
                                <a href="/admin/murid/{{$k->pendaftaranmurid_id}}">
                                    <button class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 mx-4 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        @endforeach
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
