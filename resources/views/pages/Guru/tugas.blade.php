@extends('layout.Layout_Guru')

@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarkelas')
@endsection

@section('content')
<div class="pt-5 pb-10 rounded bg-white">
    <div class="items-center pr-6 pl-6 text-xl text-bold ">
        {{$dataKelas->kelas_nama}}
    </div>
</div>

<div class="mt-5 p-8 rounded bg-white">
    <div class=" flex justify-between">
        <div class="items-center pr-6 pl-6  text-2xl text-bold ">
            Tugas
        </div>
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('myModal2').showModal()">
            + Buat Tugas
          </button>
    </div>

</div>


<dialog id="myModal2" class="w-full bg-white rounded-md ">

<div class="flex w-full h-auto justify-end items-center">
    <div class="flex flex-row w-full h-auto py-3 text-2xl font-bold">
        <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">

                <h1 class="text-2xl text-gray-600 m-0 p-0 leading-none">Tugas</h1>

        </div>

    </div>
    <div onclick="document.getElementById('myModal2').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
    </div>
</div>
        <form action="{{url('/guru/kelas/'.$dataKelas->kelas_id.'/addfeed')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
                <div>
                            <textarea type="text" name="keterangan" cols="30" rows="5" style="resize: none" placeholder="type your post here"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" ></textarea>
                </div>
                <label class="block" for="lampiran">Lampiran<label>
                <input type="file" placeholder="file" name="lampiran"
                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                <input type="hidden" name="pengguna_id"
                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_id}}">
                <button class="w-1/5 float-right px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Post</button>

            </div>
        </form>

</dialog>


@endsection
@section('footer')

@endsection
