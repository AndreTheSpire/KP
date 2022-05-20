@extends('layout.Layout_Murid')

@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarkelas')
@endsection

@section('content')

<div class="flex flex-row w-full gap-2 break-words p-2 text-xs lg:text-lg">
    <div class=" w-3/4 bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-75 ">

        <div class=" -outline flex justice-between items-center w-full bg-white py-5 pr-5">
            {{-- @dd($dataTugas) --}}
            <p class="menu-btn text-black focus:outline-none text-xl w-3/4"> {{$detailTugas->tugas_nama}}</p>
            <p class="text-right w-1/4 text-black"> Tanggat : {{$tanggatwaktutampilan}}</p>

            </div>
        <div class="flex flex-row gap-2 lg:gap-4 break-normal">
            <div class="">
                {{$detailTugas->tugas_keterangan}}
            </div>
            <div class="">

            </div>
        </div>
        @if ($detailTugas->lampiran=="kosong")

        @else
        <div class="text-xs lg:text-base mb-2">
            <div class="text-xs lg:text-base bg-gray-100 round p-5">
                <a href="{{ url("/murid/downloadlampirantugas/$detailTugas->tugas_id") }}">{{$detailTugas->lampiran}}</a>

            </div>
        </div>
        @endif
    </div>

        <form action="/murid/kelas/{{$dataKelas->kelas_id}}/tugas/uploadtugas" method="POST" class="bg-white dark:bg-ocean-light dark:bg-opacity-50 shadow-md rounded-md flex flex-row p-5 flex flex-col bg-opacity-75 " enctype="multipart/form-data">
            @csrf
            <div class="font-semibold border-b-2 mb-2 pb-2">Submit Tugas</div>
            @if ($detailTugas->tanggat_waktu > Carbon\Carbon::now())
            <div>
                <input type="file" name="file_upload" id="">
            </div>
            @else
            <div>
                Tanggat Waktu sudah habis
            </div>
            @endif


            <input type="hidden" class="" value="{{$detailTugas->tugas_id}}" name="id_tugas">
            @if ($dataTugas->url_pengumpulan!=null)
            <div class=" text-center text-green-400 bg-white-500 text-white font-bold py-2 px-4 rounded">Already Submited</div>
            @else
            <br>
            @endif

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>

        </form>
</div>



@endsection
@section('footer')

@endsection
