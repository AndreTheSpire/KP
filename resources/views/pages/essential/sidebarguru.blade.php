 <!-- start sidebar -->
 <div id="sideBar" class="ml-10 flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


    <!-- sidebar content -->
    <div class="flex flex-col">

      <!-- sidebar toggle -->
      <div class="text-right hidden md:block mb-4">
        <button id="sideBarHideBtn">
          <i class="fa fa-times-circle"></i>
        </button>
      </div>
      <!-- end sidebar toggle -->
      <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
        <div class="w-8 h-8 overflow-hidden rounded-full">
          <img class="w-full h-full object-cover" src="/upload/{{Auth::guard('satpam_pengguna')->user()->pengguna_photo}}" >
        </div>

        <div class="ml-2 capitalize flex ">
          <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}</h1>
        </div>
      </button>

      <p class="flex items-center uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Kelas</p>

      <!-- link -->
      @if (sizeOf($datasebagaiguru )>0)
        @foreach ($datasebagaiguru as $k)
        <a href="/guru/kelas/{{$k->kelas_id}}/" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fa fa-envelope-open-text text-xs mr-2"></i>
            {{$k->kelas_nama}}
        </a>
        @endforeach
      @else
      <a class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition text-center ease-in-out duration-500">
        Tidak Memiliki kelas!
      </a>
      <a class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition text-center  ease-in-out duration-500">
        Silahkan menunggu admin
      </a>
      @endif

      <!-- end link -->








    </div>
    <!-- end sidebar content -->

  </div>
  <!-- end sidbar -->
