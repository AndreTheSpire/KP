{{-- <nav class="container flex justify-between px-4 py-8 mx-auto bg-white">
    <div class="hidden space-x-8 lg:flex">

        @foreach ($dataTugas as $Tugas)
        <a href="/guru/penilaian/">{{$Tugas->tugas_nama}}</a>
        @endforeach
    </div>
    <div class="flex lg:hidden">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="w-6 h-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16"
        />
      </svg>
    </div>
  </nav> --}}

  <!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-white">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">

        <div class="flex-1 flex sm:items-stretch sm:justify-start">

            @php
            $i=-1;
            @endphp
            <div class="flex space-x-4">

                @foreach ($dataTugas as $Tugas)
                @php
                    $i++;
                @endphp
                <a href="/guru/penilaian/{{$Tugas->kelas_id}}/{{$Tugas->tugas_id}}" class="px-3 py-2 rounded-md text-sm font-medium {{ $title === "tugas".$i ? "bg-gray-300 text-black border border-blue-400 border-t-0 border-l-0 border-r-0 border-b-10" : "text-black hover:bg-gray-400 hover:text-black " }}" >{{$Tugas->tugas_nama}}</a>
                @endforeach

            </div>

        </div>

      </div>
    </div>

  </nav>
