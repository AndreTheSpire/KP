@extends('layout.Layout_admin')
@section('container')

    <table class="table-auto border-collapse border border-slate-500">
        <thead>
            <tr >
                <th class="border border-slate-600 text-center">Nama Guru</th>
                <th class="border border-slate-600 text-center">Email Guru</th>
                <th class="border border-slate-600 text-center">Tanggal Lahir</th>
                <th class="border border-slate-600 text-center">Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_guru as $data_daftar_guru)
                <tr>
                    <td class="border border-slate-600 text-center">{{$data_daftar_guru->pengguna_nama}}</td>
                    <td class="border border-slate-600 text-center">{{$data_daftar_guru->pengguna_email}}</td>
                    <td class="border border-slate-600 text-center">{{$data_daftar_guru->pengguna_tanggallahir}}</td>
                    <td class="border border-slate-600 text-center"><a href=""><button class="bg-orange-600 hover:bg-orange-300 text-white font-bold py-2 px-4 rounded-full" type="button">Detail</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
