@extends('layout.Layout_admin')
@section('container')
@include('sweetalert::alert')
    <h1 class="mx-2">Daftar Pelajaran kelas</h1>
    <button class="bg-blue-500 hover:bg-blue-700 text-white mx-2 font-bold py-2 px-4 rounded"  onclick="document.getElementById('myModal').showModal()">Tambah Pelajaran Kelas</button>

    <div class="flex items-center justify-center p-10 border-4 border-dotted ">
    <table class="table-fixed border-collapse border border-slate-500 w-4/5">
        <thead>
            <tr >
                <th class="border border-slate-600 text-center w-full">ID Pelajaran</th>
                <th class="border border-slate-600 text-center w-full">Nama Pelajaran</th>
                <th class="border border-slate-600 text-center w-full">Edit</th>
                <th class="border border-slate-600 text-center w-full">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPelajaran as $d)
                <tr>
                    <td class="border border-slate-600 text-center w-full">{{$d->pelajaran_id}}</td>
                    <td class="border border-slate-600 text-center w-full">{{$d->pelajaran_nama}}</td>
                    <td class="border border-slate-600 text-center w-full"><a href="/admin/{{$d->pelajaran_id}}/edit"><button>Edit</button></a></td>
                    <td class="border border-slate-600 text-center w-full"><a href="/admin/{{$d->pelajaran_id}}/deletepelajaran"><button>Delete</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
