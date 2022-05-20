@extends('layout.Layout_Guru')

@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarkelas')
@endsection

@section('content')

<div class="flex flex-row w-full gap-2 break-words p-2 text-xs lg:text-lg flex-wrap">
    <div class="bg-white w-full dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md p-5 flex flex-col bg-opacity-75 flex-shrink">

        <div class=" flex justice-between">
            <div class=" -outline flex justice-between items-center w-full bg-white py-5 pr-5">
            {{-- @dd($dataTugas) --}}
            <p class="menu-btn text-black focus:outline-none text-xl w-3/4"> {{$detailTugas->tugas_nama}}</p>
            <p class="text-right w-1/4 text-black"> Tanggat : {{$tanggatwaktutampilan}}</p>

            </div>


        <div class="float-right p-5 flex">
            <div onclick="updatetugas({{$detailTugas->tugas_id}},'{{$detailTugas->tugas_nama}}','{{$tanggatwaktu}}','{{$detailTugas->tugas_keterangan}}')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </div>
            <div class="ml-3" onclick="deletetugas({{$detailTugas->tugas_id}},{{$detailTugas->kelas_id}})">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>
        </div>
        </div>
        <div class="flex flex-row gap-2 lg:gap-4 break-normal">
            <div class="">
                {{$detailTugas->tugas_keterangan}}
            </div>
        </div>
        @if ($detailTugas->lampiran=="kosong")

        @else
        <div class="text-xs lg:text-base mb-2">
            <div class="text-xs lg:text-base bg-gray-100 round p-5">
                <a href="{{ url("/guru/downloadlampirantugas/$detailTugas->tugas_id") }}">{{$detailTugas->lampiran}}</a>

            </div>
        </div>
        @endif
        <div class="flex flex-row gap-2 lg:gap-4 break-normal">
            <a href="{{ url("downloadall/$dataKelas->kelas_id/$detailTugas->tugas_id") }}">
                <button class="mt-2 place-self-center hover:underline hover:text-blue text-black font-bold py-2 px-4 rounded dark:bg-indigo-100 bg-indigo-200 hover:bg-indigo-300 dark:hover:bg-indigo-300">
                    Download All
                </button>
            </a>
        </div>


    </div>
    <div class="bg-white w-full dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row flex-wrap p-5 bg-opacity-75">
        @foreach ($dataTugas as $item)

        @include('components.cardFileMurid',
        [
            'nama'=>$item->PunyaMurid->PunyaUser->pengguna_nama,
            'url'=>$item->url_pengumpulan,
        ])

        @endforeach
    </div>
</div>

<dialog id="myModal2" class="w-full h-full bg-white rounded-md ">

    <div class="flex w-full h-auto justify-end items-center">
        <div class="flex flex-row w-full h-auto py-3 text-2xl font-bold">
            <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">

                    <h1 class="text-2xl text-gray-600 m-0 p-0 leading-none">Update Tugas</h1>

            </div>

        </div>
        <div onclick="document.getElementById('myModal2').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </div>
    </div>
            <form action="{{url('/guru/kelas/'.$dataKelas->kelas_id.'/tugas/add')}}" method="POST" id="formtugas"  enctype="multipart/form-data">
                @csrf


                    <div class="relative h-10 input-component mt-5 empty">
                        <label for="tugas_nama">Judul<label>
                        <input
                          id="tugas_nama"
                          type="text"
                          name="tugas_nama"
                          class=" w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
                          placeholder="Judul"
                        />

                    </div>
                      <div class="relative h-10 input-component mt-8 empty">
                        <label for="tanggat_waktu">Tanggat Waktu<label>
                        <input
                          id="tanggat_waktu"
                          type="datetime-local"
                          name="tanggat_waktu"
                          placeholder="Tanggat Waktu"
                          class=" w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
                        />

                      </div>

                        <div class="mt-8">
                            <label for="tugas_keterangan">Keterangan<label>
                                <textarea type="text" name="tugas_keterangan" id="tugas_keterangan"cols="30" rows="5" style="resize: none" placeholder="petunjuk (opsional)"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" ></textarea>
                        </div>

                    <label for="lampiran">Lampiran<label>
                    <input type="file" placeholder="file" name="lampiran"
                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    <input type="hidden" name="pengguna_id"
                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_id}}">
                    <button class="w-1/5 float-right px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Update</button>


            </form>

    </dialog>
    <dialog id="myModal3" class="w-1/2 md:w-1/2 p-5  bg-white rounded-md ">

        <div class="flex w-full h-auto justify-end items-center">
            <div class="flex flex-row w-full h-auto py-3 text-2xl font-bold">
                <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                    <div class="w-8 h-8 overflow-hidden rounded-full">
                      <img class="w-full h-full object-cover" src="{{ asset('image/user.svg') }}" >
                    </div>

                    <div class="ml-2 capitalize flex grid grid-rows-2 ">
                      <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}</h1>

                        <h1 class="text-sm text-gray-600 m-0 p-0 leading-none">Guru</h1>
                      </div>
                </div>

            </div>
            <div onclick="document.getElementById('myModal3').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
            </div>

                    <div class="mt-4">
                        <div>apakah kamu yakin untuk menghapus Tugas ini?</div>
                        <button class="w-1/5 float-right px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" onclick="document.getElementById('myModal3').close();">No</button>
                        <a href="" id="yes"><button class="w-1/5 mx-4 float-right px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Yes</button></a>

                    </div>


    </dialog>
    <style>
        label {
          top: 0%;
          transform: translateY(-50%);
          font-size: 15px;
          color: rgb(4, 7, 13);
        }
        .empty input:not(:focus) + label {
          top: 50%;
          transform: translateY(-50%);
          font-size: 14px;
        }
        input:not(:focus) + label {
          color: rgba(70, 70, 70, 1);
        }
        input {
          border-width: 1px;
        }
        input:focus {
          outline: none;
          border-color: rgba(37, 99, 235, 1);
        }
        </style>

@endsection
@section('footer')

@endsection
