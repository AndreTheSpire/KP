@extends('layout.Layout_admin')
@section('container')
@include('sweetalert::alert')
    <div class="flex justify-between">
        <button class="btn inline-block h-10 w-auto px-6 mx-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" onclick="document.getElementById('myModal').showModal()">
            Tambah Pelajaran
        </button>
        <div class="mb-3 xl:w-96">
          <div class="input-group relative flex flex-wrap items-stretch mb-4 rounded">
            <input type="search" class="form-control relative flex-auto min-w-48 block px-7 mx-1 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
            <button class="btn inline-block px-6 mx-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                </svg>
              </button>
          </div>
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
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Nama Pelajaran</th>
                    <th scope="col" class="border border-slate-500 text-sm font-medium text-white px-6 py-4 font-bold">Action</th>
                  </tr>
                </thead class="border-b">
                <tbody>
                    @foreach ($dataPelajaran as $d)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 border border-slate-500 whitespace-nowrap text-sm font-medium text-gray-900">{{$d->pelajaran_id}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">{{$d->pelajaran_nama}}</td>
                            <td class="text-sm text-gray-900 border border-slate-500 font-light px-6 py-4 whitespace-nowrap">
                                <a href="/admin/{{$d->pelajaran_id}}/editpelajaran">
                                    <button class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 mx-4 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                </a>
                                <a href="/admin/{{$d->pelajaran_id}}/deletepelajaran">
                                    <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 mx-4 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
                        Tambah Pelajaran
                </div>
                <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </div>
            </div>
            <form action={{url("/admin/tambahpelajaran")}} method="POST">
                @csrf
                <div class="flex w-full py-10 px-2 justify-center items-center rounded text-center text-gray-500">
                    <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-6">
                        <label for="pelajaran_nama">Nama Pelajaran</label>
                        <input type="text" name="pelajaran_nama" id="pelajaran_nama" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('pelajaran_nama')}}" />
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
@endsection
