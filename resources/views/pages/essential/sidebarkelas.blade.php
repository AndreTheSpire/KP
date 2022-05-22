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
      <!-- end sidebar toggle -->

      <!-- link -->
      @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
      <a href='/guru/kelas/{{$dataKelas->kelas_id}}/' class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md  {{ $title === "post" ? "bg-gray-400" : " " }}">
        <i class="fa fa-envelope-open-text text-xs mx-2 "></i>
        Post
      </a>
      @else
      <a href='/murid/kelas/{{$dataKelas->kelas_id}}/' class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md  {{ $title === "post" ? "bg-gray-400" : " " }}">
        <i class="fa fa-envelope-open-text text-xs mx-2 "></i>
        Post
      </a>
      @endif

      <!-- end link -->

      <!-- link -->
      @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
      <a href="/guru/kelas/{{$dataKelas->kelas_id}}/tugas" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "tugas" ? "bg-gray-400" : " " }}">
        <i class="fa fa-book text-xs mx-2"></i>
        Tugas
      </a>
      @else
      <a href="/murid/kelas/{{$dataKelas->kelas_id}}/tugas" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "tugas" ? "bg-gray-400" : " " }}">
        <i class="fa fa-book text-xs mx-2"></i>
        Tugas
      </a>
      @endif

      <!-- end link -->
        <!-- link -->
        @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)

        @else
        <a href="/murid/kelas/{{$dataKelas->kelas_id}}/nilai" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "nilai" ? "bg-gray-400" : " " }}">
          <i class="fa fa-check-square text-xs mx-2"></i>
          Nilai
        </a>
        @endif

        <!-- end link -->

          <!-- link -->
          @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
          <a href="/guru/kelas/{{$dataKelas->kelas_id}}/absensi" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "absensi" ? "bg-gray-400" : " " }}">
            <i class="fa fa-check-square text-xs mx-2"></i>
            Absensi
          </a>
          @else
          <a href="/murid/kelas/{{$dataKelas->kelas_id}}/absensi" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "absensi" ? "bg-gray-400" : " " }}">
            <i class="fa fa-check-square text-xs mx-2"></i>
            Absensi
          </a>
          @endif

          <!-- end link -->

      <!-- link -->
      @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
      <a href="/guru/kelas/{{$dataKelas->kelas_id}}/member" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "member" ? "bg-gray-400" : " " }}">
        <i class="fa fa-users text-xs mx-2"></i>
        Member
      </a>
      @else
      <a href="/murid/kelas/{{$dataKelas->kelas_id}}/member" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "member" ? "bg-gray-400" : " " }}">
        <i class="fa fa-users text-xs mx-2"></i>
        Member
      </a>
      @endif

      <!-- end link -->



    </div>
    <!-- end sidebar content -->

  </div>
  <!-- end sidbar -->
