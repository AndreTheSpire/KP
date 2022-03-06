@extends('layout.Layout_admin')
@section('container')

    <h1>Detail Penerimaan CV Guru</h1>
    <label>Nama Guru : {{$data_detail->pengguna_nama}}</label><br>
    <label>Email Guru : {{$data_detail->pengguna_email}}</label><br>
    <label>No.HP Guru : {{$data_detail->pengguna_nohp}}</label><br>
    <label>Alamat Guru : {{$data_detail->pengguna_alamat}}</label><br>
    <label>Download CV : <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download CV</button></label><br><br>

    <label>Apakah anda menerima {{$data_detail->pengguna_nama}} untuk diwawancarai ?</label><br>
    <a href="/admin/detailcvguru/{{$data_detail->pengguna_id}}/confirm"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Yes</button></a>
@endsection
