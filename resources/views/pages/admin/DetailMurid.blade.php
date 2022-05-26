@extends('layout.layout_admin')
@section('container')



   <div class="bg-white flex-1 p-6 md:mt-16">
    <form class="w-full" action={{url("/updateprofile")}} method="POST" enctype="multipart/form-data">
        @csrf
    <div class="w-full flex justify-center items-center">
        <div class="w-full ">
            <div class="pt-5 pb-10 rounded bg-white">
                <div class="items-center px-8 text-xl text-bold ">
                    Detail Murid
                </div>
            </div>
            <div class="w-full p-10 flex flex-wrap" id="modal">
                {{-- @dd(Auth::guard('satpam_pengguna')->user()->pengguna_photo); --}}
                @php
                    $foto=$datadetailmurid->pengguna_photo;
                @endphp
                    <label
                        class="flex flex-col w-auto h-3/4 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                        <div class="items-center h-full flex justify-center">
                            <img class="w-56 h-56 rounded-full object-fill items-center" id="output"  src="/upload/{{$foto}}" >

                        </div>

                    </label>
                    <div class="w-4/6 pl-5">
                        <div class="flex items-center mb-6 w-full">
                            <div class="w-1/4">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-id">
                                Nama
                              </label>
                            </div>
                            <div class="w-3/4">
                              <input name="pengguna_nama" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-id" type="text" value="{{$datadetailmurid->pengguna_nama}}">
                            </div>
                          </div>
                        <div class="flex items-center mb-6 w-full">
                          <div class="w-1/4">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                              Email
                            </label>
                          </div>
                          <div class="w-3/4">
                            <input disabled="disabled" name="pengguna_email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$datadetailmurid->pengguna_email}}">
                          </div>
                        </div>
                        <div class="flex items-center mb-6 w-full">
                          <div class="w-1/4">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-email">
                              No Handphone
                            </label>
                          </div>
                          <div class="w-3/4">
                            <input name="pengguna_nohp" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="text" value="{{$datadetailmurid->pengguna_nohp}}">
                          </div>
                        </div>
                        <div class="flex items-center mb-6 w-full">
                            <div class="w-1/4">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="pengguna_jeniskelamin">
                                Jenis Kelamin
                              </label>
                            </div>
                            <div class="w-3/4">
                                <select id="pengguna_jeniskelamin" name="pengguna_jeniskelamin" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" >

                                    <option value=0 @if($datadetailmurid->pengguna_jeniskelamin == 0) selected @endif>Laki-Laki</option>
                                    <option value=1 @if($datadetailmurid->pengguna_jeniskelamin == 1) selected @endif>Perempuan</option>


                                </select>
                            </div>
                          </div>
                        <div class="flex items-center mb-6 w-full">
                            <div class="w-1/4">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-email">
                                Alamat
                              </label>
                            </div>
                            <div class="w-3/4">
                              <input name="pengguna_alamat" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="text" value="{{$datadetailmurid->pengguna_alamat}}">
                            </div>
                          </div>
                          <div class="md:flex md:items-center float-right">

                            {{-- <button class="shadow  bg-red-600 text-white hover:bg-red-400 focus:shadow-outline focus:outline-none  font-bold py-2 px-4 rounded" type="submit">
                                Save
                            </button> --}}

                          </div>
                    </div>

                {{-- <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                    <div class="w-1/4 h-1/4 overflow-hidden rounded-full">
                      <input type="file">
                      <img class="w-full h-full object-cover" src="{{ asset('image/user.svg') }}" >
                    </div>

                    <div class="ml-2 capitalize flex ">
                      <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}</h1>
                    </div>
                  </button> --}}
            </div>




        </div>
    </div>

    </form>
   </div>


<div class="font-bold text-center text-2xl">Daftar Kelas Murid </div>
<div class="flex items-center justify-center p-5 border-4 border-dotted ">


        <div class="flex flex-col w-full">
            <div class="overflow-x-auto">
              <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full text-center">
                    <thead class="border-b bg-gray-800">
                      <tr>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">No</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Nama</th>
                        <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Kelas</th>
                    </tr>
                    </thead class="border-b">
                    <tbody>
                        @if(count($datadetailmurid->AdalahMurid)==0)
                        <tr>

                            <td colspan="5" class="px-6 py-4 border border-slate-200 whitespace-nowrap text-sm font-medium text-gray-900">Tidak ada kelas</td>
                        </tr>
                        @else
                        @php
                            $x=0;
                        @endphp
                        @foreach ($datadetailmurid->AdalahMurid as $k)
                        @php
                            $x++;
                        @endphp
                        <tr>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$x}}</td>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$datadetailmurid->pengguna_nama}}</td>
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$k->punyaKelas->kelas_nama}}</td>

                            {{-- <td class="border border-slate-600 text-center w-full"><a href="/admin/murid/{{$k->pendaftaranmurid_id}}"><button class="bg-orange-600 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded-full" type="button">Detail</button></a></td> --}}

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
