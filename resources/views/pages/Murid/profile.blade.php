
@extends('layout.Layout_Murid')



@section('navbar')
    @include('pages.essential.navbarmurid')
@endsection

@section('content')

<form class="w-full" action={{url("/updateprofile")}} method="POST" enctype="multipart/form-data">
    @csrf
<div class="w-full flex justify-center items-center">
    <div class="w-3/4 ">
        <div class="pt-5 pb-10 rounded bg-white">
            <div class="items-center px-8 text-xl text-bold ">
                Profile
            </div>
        </div>
        <div class="w-full p-10 flex flex-wrap" id="modal">
            {{-- @dd(Auth::guard('satpam_pengguna')->user()->pengguna_photo); --}}
            @php
                $foto=Auth::guard('satpam_pengguna')->user()->pengguna_photo;
            @endphp
                <label
                    class="flex flex-col w-2/6 h-3/4 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                    <div class="items-center h-full justify-center">
                        <img class="w-60 h-60 rounded-full object-fill" id="output"  src="/upload/{{$foto}}" >

                    </div>
                    <input type="file"  accept="image/*" name="pengguna_photo" class="image opacity-0" />
                </label>
                <div class="w-4/6 pl-5">
                    <div class="flex items-center mb-6 w-full">
                        <div class="w-1/4">
                          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-id">
                            Nama
                          </label>
                        </div>
                        <div class="w-3/4">
                          <input name="pengguna_nama" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-id" type="text" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}">
                        </div>
                      </div>
                    <div class="flex items-center mb-6 w-full">
                      <div class="w-1/4">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                          Email
                        </label>
                      </div>
                      <div class="w-3/4">
                        <input disabled="disabled" name="pengguna_email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_email}}">
                      </div>
                    </div>
                    <div class="flex items-center mb-6 w-full">
                      <div class="w-1/4">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-email">
                          No Handphone
                        </label>
                      </div>
                      <div class="w-3/4">
                        <input name="pengguna_nohp" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="text" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_nohp}}">
                      </div>
                    </div>
                    <div class="flex items-center mb-6 w-full">
                        <div class="w-1/4">
                          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-email">
                            Alamat
                          </label>
                        </div>
                        <div class="w-3/4">
                          <input name="pengguna_alamat" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="text" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_alamat}}">
                        </div>
                      </div>
                      <div class="md:flex md:items-center float-right">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <a onclick="document.getElementById('myPass').showModal()">
                                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                    Ganti Password
                                  </button>
                            </a>

                          <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Save
                          </button>
                        </div>
                      </div>
                </div>

            {{-- <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                <div class="w-1/4 h-1/4 overflow-hidden rounded-full">
                  <input type="file">
                  <img class="w-full h-full object-cover" src="{{ asset('image/user.svg') }}" >
                </div>

                <div class="ml-2 capitalize flex ">
                  <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}</h1>
                </div>
              </button> --}}
        </div>




    </div>
</div>

</form>
<script>
    // var loadFile = function(event) {
    //     var image = document.getElementById('output');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };
    // var $modal = $('#modal');
var image = document.getElementById('output');
var cropper;

$("body").on("change", ".image", function(e){
    var files = e.target.files;
    var done = function (url) {
      image.src = url;
      $modal.modal('show');
    };
    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
      file = files[0];

      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }
});


</script>

@endsection
@section('footer')

@endsection
