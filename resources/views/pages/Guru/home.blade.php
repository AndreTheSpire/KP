@extends('layout.Layout_Guru')

@section('title')
    Home
@endsection


@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarguru')
@endsection

@section('content')

    @foreach ($dataFeed as $feed)
    @include('components.feedCard',
    [
        'feed_id'=>$feed->feed_id,
        'feed_creator'=>$feed->pengirim->pengguna_nama,
        'feed_creator_photo'=>$feed->pengirim->pengguna_photo,
        'keterangan'=>$feed->keterangan,
        'feed_waktu'=>date('d M Y, H:i', strtotime($feed->created_at)),
        'feed_lampiran'=>$feed->lampiran,
        'dataComment'=>$feed->Comment(),
    ])
    @endforeach

    <dialog id="myModal2" class="w-1/2 md:w-1/2 p-5 bg-white rounded-md ">

        <div class="flex w-full h-auto justify-end items-center">
            <div class="flex flex-row w-full h-auto py-3 text-2xl font-bold">
                <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                    <div class="w-8 h-8 overflow-hidden rounded-full">
                      <img class="w-full h-full object-cover" src="/upload/{{Auth::guard('satpam_pengguna')->user()->pengguna_photo}}" >
                    </div>

                    <div class="ml-2 capitalize flex grid grid-rows-2 ">
                      <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}</h1>

                        <h1 class="text-sm text-gray-600 m-0 p-0 leading-none">Guru</h1>
                      </div>
                </div>

            </div>
            <div onclick="document.getElementById('myModal2').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>
                <form action="{{url('/guru/kelas/angka/addfeed')}}" method="POST" id="forminput"  enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4">
                        <div>
                                    <textarea type="text" name="keterangan" id="ket" cols="30" rows="5" style="resize: none" placeholder="type your post here"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" ></textarea>
                        </div>
                        <div class="text-xs lg:text-base mb-2" id="taglampiran">
                            <div class="text-xs lg:text-base bg-gray-100 round p-5">
                                @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
                                <a id="lampiranfeed" href="{{ url("/guru/downloadlampiranfeed/") }}">a</a>
                                @else
                                <a  href="{{ url("/murid/downloadlampiranfeed/") }}">a</a>
                                @endif
                                <a class="float-right" onclick="hapuslampiran()">X</a>


                            </div>
                        </div>
                        <label class="block" for="lampiran">Lampiran<label>
                        <input type="file" placeholder="file" name="lampiran"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        <input type="hidden" name="pengguna_id"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_id}}">
                        <input type="hidden" name="statuslampiran" id="statuslampiran"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" value="kosong">
                        <button class="w-1/5 float-right px-6 py-2 mt-4 text-white bg-red-600 rounded-lg hover:bg-red-400">Post</button>

                    </div>
                </form>

    </dialog>
    <dialog id="myModal3" class="w-1/2 md:w-1/2 p-5  bg-white rounded-md ">

        <div class="flex w-full h-auto justify-end items-center">
            <div class="flex flex-row w-full h-auto py-3 text-2xl font-bold">
                <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                    <div class="w-8 h-8 overflow-hidden rounded-full">
                      <img class="w-full h-full object-cover" src="/upload/{{Auth::guard('satpam_pengguna')->user()->pengguna_photo}}" >
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
                        <div>apakah kamu yakin untuk menghapus post ini?</div>
                        <button class="w-1/5 float-right px-6 py-2 mt-4  bg-red-600 text-white hover:bg-red-400 rounded-lg " onclick="document.getElementById('myModal3').close();">No</button>
                        <a href="" id="yes"><button class="w-1/5 mx-4 float-right px-6 py-2 mt-4 text-white bg-red-600 rounded-lg hover:bg-red-400">Yes</button></a>

                    </div>


    </dialog>
@endsection
@section('footer')

@endsection

