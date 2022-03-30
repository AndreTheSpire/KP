@extends('layout.Layout_admin')
@section('container')

<div class="box-border bg-orange-100">
    <h1 class="flex justify-center text-4xl font-bold">Detail Penerimaan Guru Resmi</h1><br>
    <table class="table-auto flex items-center justify-center p-2 w-full">
        <tbody class="w-3/4">
            <tr class="grid grid-cols-12">
                    <td class="text-center w-full font-bold text-xl col-span-7">Nama Guru</td>
                    <td class="w-full text-xl col-span-5">: {{$data_detail->pengguna_nama}}</td>
                </tr>
                <tr class="grid grid-cols-12">
                    <td class="text-center w-full font-bold text-xl col-span-7">Email Guru</td>
                    <td class="w-full text-xl col-span-5">: {{$data_detail->pengguna_email}}</td>
                </tr>
                <tr class="grid grid-cols-12">
                    <td class="text-center w-full font-bold text-xl col-span-7">No.HP Guru</td>
                    <td class="w-full text-xl col-span-5">: {{$data_detail->pengguna_nohp}}</td>
                </tr>
                <tr class="grid grid-cols-12">
                    <td class="text-center w-full font-bold text-xl col-span-7">Alamat Guru</td>
                    <td class="w-full text-xl col-span-5">: {{$data_detail->pengguna_alamat}}</td>
                </tr>
                <tr class="grid grid-cols-12">
                    <td class="text-center w-full font-bold text-xl col-span-7">Download CV</td>
                    <td class="w-full text-xl col-span-5">: <a href="{{ url("/admin/download/$data_detail->pengguna_id") }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold font-bold h-6 px-4 m-2 rounded inline-flex items-center">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                        <span>Download</span>
                        </button>
                    </td>
                </tr>
        </tbody>
    </table>
    <label class="flex justify-center text-2xl font-bold">Apakah anda menerima {{$data_detail->pengguna_nama}} sebagai guru resmi ?</label><br>
    <div class="flex justify-center">
        <a href="/admin/detailwawancaraguru/{{$data_detail->pengguna_id}}/confirm">
            <button class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 mx-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </button></a>
        <a href="/admin/detailwawancaraguru/{{$data_detail->pengguna_id}}/decline">
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
            </button></a>
    </div>
</div>
@endsection
