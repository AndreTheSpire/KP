@extends('layout.Layout_admin')
@section('container')

@include('sweetalert::alert')
<div class="flex flex-col w-full h-auto bg-orange-200 ">
    <div class="flex w-full h-auto justify-end items-center">
        <div class="flex flex-row w-full h-auto py-3 justify-center items-center text-2xl font-bold">
                Tambah Kelas
        </div>
    </div>
    <div class="flex w-full h-auto justify-end items-center">
        <div class="flex flex-row w-full h-auto py-3 justify-center items-center text-2xl font-bold">
            <img src="{{url('/image/cettatf.png')}}" alt="" class="object-contain h-24 w-80">
        </div>
    </div>
    <form action={{url("/admin/kelas/dobuatkelas")}} method="POST">
        @csrf
        <div class="flex w-full py-10 px-2 justify-center items-center rounded text-center text-gray-500">
            <div class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                <div class="md:col-span-6">
                <label for="kelas_nama" class="text-xl text-black">Nama Kelas</label>
                <input type="text" name="kelas_nama" id="kelas_nama" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('kelas_nama')}}" />
                @error("kelas_nama")
                    <div class="text-xs text-red-500">{{$message}}</div>
                @enderror
                </div>
                <div class="md:col-span-6">
                <label for="kelas_deskripsi"  class="text-xl text-black">Deskripsi</label>
                <input type="text" name="kelas_deskripsi" id="kelas_deskripsi" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('kelas_deskripsi')}}" />
                @error("kelas_deskripsi")
                    <div class="text-xs text-red-500">{{$message}}</div>
                @enderror
                </div>
                <div class="md:col-span-3">
                <label for="waktu_mulai"  class="text-xl text-black">Waktu Mulai</label>
                <input type="datetime-local" name="waktu_mulai" id="waktu_mulai" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('waktu_mulai')}}" />
                @error("waktu_mulai")
                    <div class="text-xs text-red-500">{{$message}}</div>
                @enderror
                </div>

                <div class="md:col-span-3">
                <label for="waktu_selesai"  class="text-xl text-black">Waktu Berakhir </label>
                <input type="datetime-local" name="waktu_selesai" id="waktu_selesai" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{old('waktu_selesai')}}" placeholder="" />
                @error("waktu_selesai")
                    <div class="text-xs text-red-500">{{$message}}</div>
                @enderror
                </div>


                <div class="md:col-span-6 text-right">
                <div class="inline-flex items-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    </form>
</div>
    <style>
        label {
          top: 0%;
          transform: translateY(-50%);
          font-size: 11px;
          color: rgba(37, 99, 235, 1);
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
