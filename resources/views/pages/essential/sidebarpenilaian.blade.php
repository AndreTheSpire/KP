 <!-- start sidebar -->
 <div id="sideBar" class="ml-10 flex flex-col flex-wrap border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


    <!-- sidebar content -->
    <div class="flex flex-col">

      <!-- sidebar toggle -->
      <div class="text-right hidden md:block mb-4">
        <button id="sideBarHideBtn">
          <i class="fa fa-times-circle"></i>
        </button>
      </div>
      <p class="flex items-center uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Daftar Kelas</p>

      <!-- end sidebar toggle -->

      <!-- link -->
      @foreach ($dataKelas as $kelas)
      <a href='/guru/penilaian/{{$kelas->kelas_id}}' class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md  {{ $title === "post" ? "bg-gray-400" : " " }}">
        <i class="fa fa-envelope-open-text text-xs mx-2 "></i>
        {{$kelas->kelas_nama}}
      </a>
      @endforeach

      <!-- end link -->


    </div>
    <!-- end sidebar content -->

  </div>
  <!-- end sidbar -->
