@extends('layout.layout_admin')


@section('container')


<div class="w-full">
    @csrf
    <div class="flex items-center mb-3 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4 text-2xl text-black" for="inline-full-name">
            Penetapan kelas
          </label>
        </div>
      </div>
      <hr class="border-2 mb-3">
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-id">
            Kode Kelas
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-id" type="text" value="{{$datadetail->kelas_kode}}">
        </div>
      </div>
    <div class="flex items-center mb-6 w-full">
      <div class="w-1/4">
        <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
          Nama Kelas
        </label>
      </div>
      <div class="w-3/4">
        <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$datadetail->kelas_nama}}">
      </div>
    </div>
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-pelajaran">
            Pelajaran Kelas
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-pelajaran" type="text" value="{{$datadetail->Pelajaran->pelajaran_nama}}">
        </div>
    </div>
    <div class="flex items-center mb-6 w-full">
        <div class="w-1/4">
          <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-kategori">
            Kategori Kelas
          </label>
        </div>
        <div class="w-3/4">
          <input disabled="disabled" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-kategori" type="text" value="{{$datadetail->Kategori->kategorikelas_nama}}">
        </div>
    </div>
    </div>
    @php
    $x=0;
    @endphp
    <div class="flex flex-col">
        @if(count($datacalonmurid)==0)

        <div class="overflow-x-auto">
        <div class="py-4 inline-block min-w-full ">
            <div class="overflow-hidden">
            <table class="min-w-full text-center">
                <thead class="border-b bg-gray-800">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">No</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nama Murid</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Action</th>
                </tr>
                </thead class="border-b">
                <tbody>

                            <tr class="bg-white border-b">

                                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tidak ada Data</td>
                            </tr>

                </tbody>
            </table>
            </div>
        </div>
        </div>


        @else


        <div class="overflow-x-auto">
        <div class="py-4 inline-block min-w-full ">
            <div class="overflow-hidden">
            <table class="min-w-full text-center">
                <thead class="border-b bg-gray-800">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">No</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nama Murid</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Action</th>
                </tr>
                </thead class="border-b">
                <tbody>

                    @foreach ($datacalonmurid as $k)
                        @php
                        $x++;
                    @endphp
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$x}}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$k->PunyaUser->pengguna_nama}}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <a href="/admin/kelas/{{$datadetail->kelas_id}}/penetapan/{{$k->pendaftaranmurid_id}}">
                                        <button class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 mx-4 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>


                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>

        @endif

      </div>





@endsection
@section('footer')

@endsection
