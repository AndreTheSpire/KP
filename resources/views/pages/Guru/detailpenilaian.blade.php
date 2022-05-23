@extends('layout.Layout_Guru')

@section('title')
    Penilaian
@endsection

@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarpenilaian')
@endsection

@section('content')
<div class="pt-5 pb-10 rounded bg-white">
<div class="items-center pr-6 pl-6 text-3xl text-bold ">
    Penilaian tugas
</div>
@include('pages.essential.navbarpenilaiantugas')

        @if (sizeOf($dataTugas)>0)

        <form method="POST" action="/guru/kelas/{{$dataTugas[$nomor]->kelas_id}}/tugas/{{$dataTugas[$nomor]->tugas_id}}/simpan" class="flex flex-col gap-2 bg-white shadow mb-2 rounded-md dark:bg-ocean-light dark:bg-opacity-75">
            @csrf
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 dark:bg-ocean-light dark:bg-opacity-75 uppercase border-b border-gray-600">
                        <th class="px-4 py-3">Nama Murid</th>
                        <th class="px-4 py-3">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($dataTugas[$nomor]->tugas_murid as $nilai)
                            <tr class="text-gray-700 dark:bg-ocean-light dark:bg-opacity-75">
                                <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                    <p class="font-semibold text-black">{{$nilai->PunyaMurid->punyaUser->pengguna_nama}}</p>
                                    </div>
                                </div>
                                </td>
                                <td class="text-ms border text-center">
                                    <input type="number" class="w-full dark:bg-ocean-light dark:bg-opacity-75 px-4 py-3" name="nilai[]" value="{{$nilai->nilai}}">
                                </td>
                            </tr>
                        @endforeach
                        @if (sizeof($dataTugas[0]->tugas_murid)<=0)
                            <tr class="text-gray-700 dark:bg-ocean-light dark:bg-opacity-75">
                                <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                    <p class="font-semibold text-black">Tidak Ada Nilai, Mulai Pencarian untuk menampilkan data</p>
                                    </div>
                                </div>
                                </td>
                                <td class="text-ms border text-center">
                                    <input type="number" class="w-full dark:bg-ocean-light dark:bg-opacity-75 px-4 py-3" name="" value="">
                                </td>
                            </tr>
                        @endif
                    </tbody>
                    </table>
                </div>
            </div>

                    <div class="px-2 py-1">
                        {{-- <input type="hidden" name="id_murid" value="{{$filter_murid}}">
                        <input type="hidden" name="id_kelas" value="{{$id_kelas_sekarang}}"> --}}
                        <button type="submit" class="float-right bg-red-600 text-white py-2 px-1 px-4 w-auto md:w-1/4 bg-secondary-red hover:bg-secondary-red-hover dark:bg-secondary-red-hover dark:hover:bg-secondary-red shadow-lg block md:inline rounded-lg text-xl">Update</button>
                    </div>

        </form>

        @else
        <div class="items-center pr-6 pl-6 text-2xl text-center text-bold ">
            Belum ada Tugas untuk dinilai
        </div>
        @endif
</div>


<script>


</script>


@endsection
@section('footer')

@endsection
