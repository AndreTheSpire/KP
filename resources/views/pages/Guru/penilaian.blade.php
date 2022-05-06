@extends('layout.Layout_Guru')

@section('navbar')
    @include('pages.essential.navbarguru')
@endsection

@section('sidebar')
    @include('pages.essential.sidebarpenilaian')
@endsection

@section('content')
<div class="pt-5 pb-10 rounded bg-white">
<div class="items-center pr-6 pl-6 text-3xl text-bold ">
    Penilaian tugas
</div>


<div class="mt-5">
    <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center w-full bg-white p-5">
        <div>Halaman Penilaian! Silahkan pilih kelas untuk tugas yang ingin dinilai</div>
    </div>
</div>




<script>


</script>


@endsection
@section('footer')

@endsection
