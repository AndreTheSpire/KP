@extends('layout.Layout_admin')
@section('container')
@include('sweetalert::alert')


<button class="btn inline-block h-10 w-auto px-6 mx-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" onclick="document.getElementById('myModal').showModal()">
    Tambah Kategori
</button>

<div class="flex flex-col">
    @foreach ($dataPelajaran as $d)
        <div class=" text-center text-3xl w-full">{{$d->pelajaran_nama}}</div>
        <div class="overflow-x-auto">
        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
            <table class="min-w-full text-center">
                <thead class="border-b bg-gray-800">
                <tr>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4">ID Kategori</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4">Nama Kategori</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4">Action</th>
                </tr>
                </thead class="border-b">
                <tbody>
                    @foreach ($dataKategori as $k)
                        @if ($d->pelajaran_id==$k->pelajaran_id)
                            <tr class="bg-white border-b">
                                <td class="border border-slate-500 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$k->kategorikelas_id}}</td>
                                <td class="border border-slate-500 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$k->kategorikelas_nama}}</td>
                                <td class="border border-slate-500 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <a href="/admin/{{$k->kategorikelas_id}}/edit">
                                        <button class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 mx-4 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <a href="/admin/{{$k->kategorikelas_id}}/deletekategori">
                                        <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 mx-4 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @else

                        @endif

                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    @endforeach
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

<dialog id="myModal" class="w-11/12 md:w-1/2 p-5  bg-white rounded-md ">
    <div class="flex flex-col w-full h-auto ">
        <div class="flex w-full h-auto justify-end items-center">
            <div class="flex flex-row w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                    Tambah Kategori Pelajaran
            </div>
            <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>
        <form action={{url("/admin/tambahkategori")}} method="POST">
            @csrf
            <div class="flex w-full py-10 px-2 justify-center items-center rounded text-center text-gray-500">
                <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                    <div class="md:col-span-6">
                        <label for="pelajaran_id"  class="text-xl text-black">Pelajaran</label>
                        <select id="pelajaran_id" name="pelajaran_id" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                            @foreach ($dataPelajaran as $d)
                            <option value="{{$d->pelajaran_id}}">{{$d->pelajaran_nama}}</option>
                            @endforeach


                        </select>
                        @error("pelajaran_id")
                            <div class="text-xs text-red-500">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                    <div class="md:col-span-6">
                    <label for="kategorikelas_nama">Nama Kategori</label>
                    <input type="text" name="kategorikelas_nama" id="kategorikelas_nama" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('pelajaran_nama')}}" />
                    </div>
                    <div class="md:col-span-6 text-right">
                        <div class="inline-flex items-endt">
                            <button type="submit" class="bg-secondary-red hover:bg-secondary-red-hover text-black font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</dialog>
</div>
@endsection
