@extends('layout.Layout_admin')
@section('container')

    <table class="table-fixed border-collapse border border-slate-500">
        <thead>
            <tr >
                <th class="border border-slate-600 text-center w-full">Nama Guru</th>
                <th class="border border-slate-600 text-center w-full">Email Guru</th>
                <th class="border border-slate-600 text-center w-full">Tanggal Lahir</th>
                <th class="border border-slate-600 text-center w-full">Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_guru as $data_daftar_guru)
                <tr>
                    <td class="border border-slate-600 text-center w-full">{{$data_daftar_guru->pengguna_nama}}</td>
                    <td class="border border-slate-600 text-center w-full">{{$data_daftar_guru->pengguna_email}}</td>
                    <td class="border border-slate-600 text-center w-full">{{$data_daftar_guru->pengguna_tanggallahir}}</td>
                    <td class="border border-slate-600 text-center w-full"><a href="/admin/detailguru"><button class="bg-orange-600 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded-full" type="button">Detail</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
