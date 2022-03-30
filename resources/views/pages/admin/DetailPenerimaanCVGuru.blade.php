@extends('layout.Layout_admin')
@section('container')
    <div class="box-border bg-orange-100">
        <h1 class="flex justify-center text-4xl font-bold">Detail Penerimaan CV Guru</h1><br>
        <table class="table-auto flex items-center justify-center p-2 w-full">
            <tbody class="w-3/4">
                <tr class="grid grid-cols-12">
                        <td class="text-center w-full font-bold text-xl col-span-7">Nama Guru</td>
                        <td class="w-full text-xl col-span-5">: {{$data_detail->pengguna_nama}}</td>
                    </tr>
                    <tr class="grid grid-cols-12">
                        <td class="text-center w-full font-bold text-xl col-span-7">Email Guru</td>
                        <td class="w-full text-xl col-span-5">: {{$data_detail->pengguna_email}}</td>
                    </tr>
                    <tr class="grid grid-cols-12">
                        <td class="text-center w-full font-bold text-xl col-span-7">No.HP Guru</td>
                        <td class="w-full text-xl col-span-5">: {{$data_detail->pengguna_nohp}}</td>
                    </tr>
                    <tr class="grid grid-cols-12">
                        <td class="text-center w-full font-bold text-xl col-span-7">Alamat Guru</td>
                        <td class="w-full text-xl col-span-5">: {{$data_detail->pengguna_alamat}}</td>
                    </tr>
                    <tr class="grid grid-cols-12">
                        <td class="text-center w-full font-bold text-xl col-span-7">Download CV</td>
                        <td class="w-full text-xl col-span-5">: <a href="{{ url("/admin/download/$data_detail->pengguna_id") }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold font-bold h-6 px-4 m-2 rounded inline-flex items-center">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                            <span>Download</span>
                            </button>
                        </td>
                    </tr>
            </tbody>
        </table>
        <label class="flex justify-center text-2xl font-bold">Apakah anda menerima {{$data_detail->pengguna_nama}} untuk diwawancarai ?</label><br>
        <div class="flex justify-center">
            <button class="py-2 pb-3 px-4 text-black rounded-lg bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline-block mx-auto rounded-full text-3xl" onclick="document.getElementById('myModal').showModal()">+</button>
            {{-- <a href="/admin/detailcvguru/{{$data_detail->pengguna_id}}/confirm">
                <button class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 mx-4 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </a> --}}
            <a href="/admin/detailcvguru/{{$data_detail->pengguna_id}}/decline">
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                </button>
            </a>
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
                        Tambah Kelas
                </div>
                <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </div>
            </div>
            <form action={{url("/admin/detailcvguru/$data_detail->pengguna_id/confirm")}} method="GET">
                @csrf
                <div class="flex w-full py-10 px-2 justify-center items-center rounded text-center text-gray-500">
                    <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-6">
                        <label for="zoom_link">Link Zoom</label>
                        <input type="text" name="zoom_link" id="zoom_link" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('zoom_link')}}" />
                        </div>
                        <div class="inline-flex items-end">
                            <button type="submit" class="bg-secondary-red hover:bg-secondary-red-hover text-black font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </dialog>

@endsection
