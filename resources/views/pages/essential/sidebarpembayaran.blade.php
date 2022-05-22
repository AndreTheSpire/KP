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
      <a href="/murid/pembayaran" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md  {{ $title === "semua" ? "bg-gray-400" : " " }}">
        <i class="fa fa-envelope-open-text text-xs mx-2 "></i>
        Semua
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="/murid/pembayaranbelum" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "belum" ? "bg-gray-400" : " " }}">
        <i class="fa fa-times-circle text-xs mx-2"></i>
        Belum Membayar
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="/murid/pembayaranmenunggu" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "menunggu" ? "bg-gray-400" : " " }}">
        <i class="fa fa-spinner text-xs mx-2"></i>
        Menunggu Konfirmasi
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="/murid/pembayaransukses" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "sukses" ? "bg-gray-400" : " " }}">
        <i class="fa fa-shield-check text-xs mx-2"></i>
        Pembayaran Sukses
      </a>

      <!-- end link -->

      <!-- link -->
      <a href="/murid/pembayarangagal" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 rounded-md {{ $title === "gagal" ? "bg-gray-400" : " " }}">
        <i class="fa fa-user-times text-xs mx-2"></i>
        Pembayaran Gagal
      </a>
      <!-- end link -->

    </div>
    <!-- end sidebar content -->

  </div>
  <!-- end sidbar -->
