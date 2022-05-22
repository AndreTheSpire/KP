<!-- start navbar -->
<div class="md:fixed md:w-full md:top-0 md:z-20 flex sticky top-0 flex-row flex-wrap items-center bg-white p-2 border-b border-gray-300">

    <!-- logo -->
    <div class="flex-none ml-20 w-40 flex flex-row items-center">
      <img src="{{ asset('image/cettatf.png') }}" class="w-25 flex-none">


      <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
        <i class="fad fa-list-ul"></i>
      </button>
    </div>
    <!-- end logo -->

    <!-- navbar content toggle -->
    <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
      <i class="fad fa-chevron-double-down"></i>
    </button>
    <!-- end navbar content toggle -->

    <!-- navbar content -->
    <div id="navbar" class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
      <!-- left -->
      <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
        <a class="mr-5 transition duration-500 ease-in-out hover:text-gray-900" href="/guru" title="Home"><i class="fad fa-home"></i> Home</a>
        <a class="mr-5 transition duration-500 ease-in-out hover:text-gray-900" href="/guru/kelas" title="Kelas"><i class="fad fa-users"></i> Kelas</a>
        <a class="mr-5 transition duration-500 ease-in-out hover:text-gray-900" href="/guru/penilaian" title="Penilaian"><i class="fad fa-pencil"></i> Penilaian</a>
      </div>
      <!-- end left -->

      <!-- right -->
      <div class="flex flex-row-reverse items-center">

        <!-- user -->
        <div class="dropdown relative md:static">

          <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
            <div class="w-8 h-8 overflow-hidden rounded-full">
              <img class="w-full h-full object-cover" src="/upload/{{Auth::guard('satpam_pengguna')->user()->pengguna_photo}}" >
            </div>

            <div class="ml-2 capitalize flex ">
              <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}</h1>
              <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
            </div>
          </button>

          <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

          <div class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="/profile">
              <i class="fad fa-user-edit text-xs mr-1"></i>
              edit my profile
            </a>
            <!-- end item -->

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="/guru/notifikasi">
              <i class="fad fa-bells text-xs mr-1"></i>
              Notifications
            </a>
            <!-- end item -->



            <hr>

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="/logout">
              <i class="fad fa-user-times text-xs mr-1"></i>
              log out
            </a>
            <!-- end item -->

          </div>
        </div>
        <!-- end user -->

        <!-- notifcation -->
        <div class="dropdown relative mr-5 md:static">

          <button class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
            <i class="fad fa-bells"></i>
          </button>

          <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

          <div class="menu hidden rounded bg-white md:right-0 md:w-full shadow-md absolute z-20 right-0 w-84 mt-5 py-2 animated faster">
            <!-- top -->
            <div class="px-4 py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
              <h1>notifications</h1>
              <div class="bg-teal-100 border border-teal-200 text-teal-500 text-xs rounded px-1">
                <strong>{{sizeOf($dataNotifikasi)}}</strong>
              </div>
            </div>
            <hr>
            <!-- end top -->

            @php
                $x=0;
            @endphp
            <!-- body -->
            @foreach ($dataNotifikasi as $dn)
            @php
                $x++;
            @endphp
            @if ($x<6)
            @if ($dn->notifikasi_jenis==1)
            @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
            <a href="/guru/kelas/{{$dn->notifikasi_kelas}}/tugas/{{$dn->notifikasi_jenis_id}}" class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out">
            @else
            <a href="/murid/kelas/{{$dn->notifikasi_kelas}}/tugas/{{$dn->notifikasi_jenis_id}}" class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out">
            @endif

                <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                    <i class="fad fa-inbox-in"></i>
                </div>

                <div class="flex-1 flex flex-rowbg-green-100">
                  <div class="flex-1">
                    <h1 class="text-sm font-semibold">Tugas {{$dn->punyaTugas->tugas_nama}}</h1>
                    <p class="text-xs text-gray-500">sudah dibuat</p>
                  </div>
                  <div class="text-right text-xs text-gray-500">
                    @if (Carbon\Carbon::now()->diffInMinutes($dn->created_at) < 60)
                      <p>{{Carbon\Carbon::now()->diffInMinutes($dn->created_at)}} minutes</p>
                      @else

                      <p>{{round( number_format(Carbon\Carbon::now()->diffInMinutes($dn->created_at) / 60, 2)) }} hour</p>
                      @endif
                  </div>
                </div>

              </a>
              <hr>

            @else

            @endif
            @else

            @endif

                  <!-- item -->

              <!-- end item -->
            @endforeach




            <!-- end body -->

            <!-- bottom -->
            <hr>
            <div class="px-4 py-2 mt-2">
              <a href="/guru/notifikasi" class="border border-gray-300 block text-center text-xs uppercase rounded p-1 hover:text-teal-500 transition-all ease-in-out duration-500">
                view all
              </a>
            </div>
            <!-- end bottom -->
          </div>
        </div>
        <!-- end notifcation -->




      </div>
      <!-- end right -->
    </div>
    <!-- end navbar content -->

  </div>
<!-- end navbar -->
