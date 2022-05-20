<div class="bg-white rounded-md p-2 lg:p-4 dark:bg-ocean-light dark:bg-opacity-75 my-5">
    @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
    <a href="/guru/kelas/{{$kelas_id}}/tugas/{{$tugas_id}}" class="href">
    @else
    <a href="/murid/kelas/{{$kelas_id}}/tugas/{{$tugas_id}}" class="href">
    @endif
    <div class="text-xs lg:text-base mb-2 p-5">
        Tugas baru {{$tugas_nama}} untuk kelas {{$kelas_nama}} telah dibuat
    </div>
    </a>

</div>

