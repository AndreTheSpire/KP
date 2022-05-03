<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="{{ asset('image/fav.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <title>Cetta</title>

</head>
<body class="bg-gray-100 relative">
@include('sweetalert::alert')

@yield('navbar')
@yield('headerfill')

<!-- strat wrapper -->
<div class="h-screen flex flex-row flex-wrap">


   @yield('sidebar')

  <!-- strat content -->
  <div class="bg-gray-100 flex-1 p-6 md:mt-16">
    @yield('content')
  </div>
  <!-- end content -->

</div>
<!-- end wrapper -->

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- end script -->

<style>
    dialog[open] {
        animation: appear .15s cubic-bezier(0, 1.8, 1, 1.8);
    }

    dialog::backdrop {
      background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(54, 54, 54, 0.5));
      backdrop-filter: blur(3px);
    }


  @keyframes appear {
    from {
      opacity: 0;
      transform: translateX(-3rem);
    }

    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
</style>

<dialog id="myModal" class="w-11/12 md:w-1/2 p-5  bg-white rounded-md ">


    <div class="flex w-full h-auto justify-end items-center">
        <div class="flex flex-row w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                Daftar kelas
        </div>
        <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </div>
    </div>
            <form action={{url("/murid/dodaftarmurid")}} method="POST">
                @csrf
                <div class="mt-4">
                    <div>
                        <label class="block" for="Name">Name<label>
                                <input type="text" placeholder="Name"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" disabled="disabled" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_nama}}">
                    </div>
                    <div class="mt-4">
                        <label class="block" for="email">Email<label>
                                <input type="text" placeholder="Email"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" disabled="disabled" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_email}}">
                    </div>
                    <input type="hidden" name="pengguna_id"
                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" value="{{Auth::guard('satpam_pengguna')->user()->pengguna_id}}">
                    <div class="mt-4">
                        <label class="block">Pelajaran<label>
                                <select id="pelajaran_id" name="pelajaran_id"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" onchange="getIndex()">
                                    <option value="0">Pilih Pelajaran</option>
                                    @foreach ($dataPelajaran as $d)
                                    <option value="{{$d->pelajaran_id}}">{{$d->pelajaran_nama}}</option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="mt-4">
                        <label class="block">Kategori<label>
                                <select id="kategorikelas_id" name="kategorikelas_id"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >

                                </select>
                    </div>

                    <div class="flex">
                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Daftar
                            Kelas</button>
                    </div>

                </div>
            </form>

</dialog>


<script>

    // $('#pelajaran_id').on('change', function () {
    //     console.log("masuk gak tuh!!!");
    //     getIndex();
    // });
const update= (feed_id,keteranganfeed)=>{
    var keterangan=keteranganfeed;
    console.log("masuk sini oii");
    console.log(feed_id);
    console.log(keterangan);
    document.getElementById("ket").value =keterangan;
    var frm = document.getElementById('forminput') || null;
    if(frm) {
    frm.action = "/guru/kelas/"+feed_id+"/updatefeed"
    }
    document.getElementById('myModal2').showModal();

}
const deletepost= (feed_id)=>{
    console.log("masuk sini oii");
    console.log(feed_id);
    var frm = document.getElementById('yes') || null;
    if(frm) {
    frm.href = "/guru/kelas/"+feed_id+"/deletefeed"
    }
    document.getElementById('myModal3').showModal();

}

const updatetugas= (tugas_id,judul_tugas,tanggaltugas,keterangantugas)=>{
    var keterangan=keterangantugas;
    var tanggaltf=tanggaltugas;
    console.log("masuk sini oii");
    console.log(tugas_id);
    console.log(tanggaltf);
    document.getElementById("tugas_nama").value =judul_tugas;
    document.getElementById("tanggat_waktu").value =tanggaltf;
    document.getElementById("tugas_keterangan").value =keterangan;
    var frm = document.getElementById('formtugas') || null;
    if(frm) {
    frm.action = "/guru/kelas/"+tugas_id+"/updatetugas"
    }
    document.getElementById('myModal2').showModal();

}
const deletetugas= (tugas_id,kelas_id)=>{
    console.log("masuk sini oii");
    console.log(tugas_id);
    var frm = document.getElementById('yes') || null;
    if(frm) {
    frm.href = "/guru/kelas/"+kelas_id+"/"+tugas_id+"/deletetugas"
    }
    document.getElementById('myModal3').showModal();

}
const getIndex= ()=>{
    console.log("masuk sini oii");
    var e = document.getElementById("pelajaran_id");
    var result = e.options[e.selectedIndex].value;
$.ajax({
    type : 'get',
    url : '/dependantkategori/'+result,
    success : function(data){
        $('#kategorikelas_id').empty();
        data = JSON.parse(data);
        // console.log(data);
        for (i = 0; i < data.length; i++) {
        console.log(data[i].kategorikelas_nama);
        $('#kategorikelas_id').append(new Option(data[i].kategorikelas_nama, data[i].kategorikelas_id))
        }
        // $('#kategorikelas_id').empty();
        // console.log(data);
        // $(data).each(function(x,y){
        //     console.log(y);
        //     $('#kategorikelas_id').append(new Option(y.kategorikelas_nama, y.kategorikelas_id))

        // });
    },
});
$.ajax({
    type : 'get',
    url : '/dependantguru/'+result,
    success : function(data){
        $('#guru_kelas').empty();
        data = JSON.parse(data);
         console.log(data);
        for (i = 0; i < data.length; i++) {
        console.log(data[i].punya_user.pengguna_nama);
        $('#guru_kelas').append(new Option(data[i].punya_user.pengguna_nama, data[i].punya_user.pengguna_id))
        }
        // $('#kategorikelas_id').empty();
        // console.log(data);
        // $(data).each(function(x,y){
        //     console.log(y);
        //     $('#kategorikelas_id').append(new Option(y.kategorikelas_nama, y.kategorikelas_id))

        // });
    },
});
}
</script>

</body>
</html>
