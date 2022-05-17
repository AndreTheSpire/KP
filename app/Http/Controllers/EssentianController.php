<?php

namespace App\Http\Controllers;

use App\Models\D_tugas;
use App\Models\Guru;
use App\Models\KategoriKelas;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Pengguna;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class EssentianController extends Controller
{
    // public function index()
    // {
    //     return view('cropper');
    // }

    // public function upload(Request $request)
    // {
    //     $folderPath = 'upload/';

    //     $image_parts = explode(";base64,", $request->image);
    //     $image_type_aux = explode("image/", $image_parts[0]);
    //     $image_type = $image_type_aux[1];
    //     $image_base64 = base64_decode($image_parts[1]);
    //     $file = $folderPath . uniqid() . '.png';

    //     file_put_contents($file, $image_base64);

    //     return response()->json(['success'=>'success']);
    // }

    public function GoToLogin()
    {
        return view("pages.essential.login");
    }
    public function GoToLanding()
    {
        return view("pages.essential.landing");
    }
    public function GoToProfile()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        return view("pages.essential.profile",[
            'title' => "tugas",
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function  GoTologout()
    {
        if(Auth::guard('satpam_pengguna')->check()){
            Auth::guard('satpam_pengguna')->logout();
        }
        return view("pages.essential.login");
    }
    public function GoToRegister()
    {
        return view("pages.essential.Register");
    }
    public function DoLogin(Request $request)
    {
        $ceklogin=false;
        $email=$request->input('email');
        $password=$request->input('password');
        $data_pengguna = Pengguna::all();

        $credential = [
            'pengguna_email' => $email,
            'password' => $password
        ];
        // dd($data_pengguna);
        // dd($credential);
        // dd(Auth::guard('satpam_pengguna'));
        if(Auth::guard('satpam_pengguna')->attempt($credential)){
            if(getAuthUser()->role_text == 'guru'){
                if(getAuthUser()->pengguna_status_wawancara=='1'){
                    return redirect('/guru');
                }else{
                    Alert::warning('PERINGATAN', 'Akun Anda Masih Dilock');
                    return redirect('/login');
                }

            }else{
                return redirect('/murid');
            }

        }else{
            Alert::error('ERROR', 'Akun Anda Belum Terdaftar');
            return view("pages.essential.login");
        }

        // if($data_pengguna!=null){
        //     foreach ($data_pengguna as $pgw ) { //cek login user
        //         if($pgw->pengguna_email==$email && $pgw->pengguna_password==$password ){
        //            $ceklogin=true;
        //            $tempuser=$pgw;
        //         }
        //     }
        // }

        // if($ceklogin == false){
        //     return view("pages.essential.login",['gagal'=>true]);
        // }

        // $request->session()->put('user_logged', $tempuser);


        // if($tempuser['pengguna_peran']=="0"){
        //     //bila user merupakan guru maka arahkan ke page guru
        //     $pengguna_id = $tempuser->pengguna_id;
        //     $tempuser = $tempuser;
        //     $dataKelas = Kelas::where('pengguna_id','=',$pengguna_id)->get();
        //     return redirect('/guru');
        //     // return view('pages.guru.guruHome',['dataKelas'=>$dataKelas,'user_login'=>$tempuser]);
        // }else if($tempuser['pengguna_peran']=="1"){
        //     //bila user adalah murid maka arahkan ke page murid
        //     $pengguna_id = $tempuser->pengguna_id;
        //     $dataKelas = Kelas::where('pengguna_id','=',$pengguna_id)->get();
        //     return redirect('/murid');
        // }
    }
    public function DoRegister(Request $request)
    {
        $request -> validate(
        [
            'pengguna_nama' => ['required'],
            'pengguna_email' => ['required', 'email'],
            'pengguna_password' => ['required', 'confirmed'],
            'pengguna_password_confirmation' => ['required'],
            'pengguna_nohp' => ['required', 'numeric','digits_between:10,12'],
            'pengguna_tanggallahir' => ['required'],
            'pengguna_alamat' => ['required']
        ],
        [
            'pengguna_nama.required' => "Field Nama wajib diisi",
            'pengguna_email.required' => "Field Email wajib diisi",
            'pengguna_password.required' => "Field Password wajib diisi",
            'pengguna_password.confirmed' => "Password Confirmation tidak sesuai dengan Password",
            'pengguna_password_confirmation.required' => "Field Password Confirmation wajib diisi",
            'pengguna_nohp.required' => "Field No.HP wajib diisi",
            'pengguna_tanggallahir.required' => "Field Tanggal Lahir wajib diisi",
            'pengguna_alamat.required' => "Field Alamat wajib diisi",
        ]);

        $nama_file="kosong";
        $file = $request->file('pengguna_CV_KTP_');
        // dd($file);
        if($file==null){

        }else{
            $nama_file = $file->getClientOriginalName();
            $request->file('pengguna_CV_KTP_')->storeAs('DataUser/',$nama_file, 'local');
        }

        $role=$request->input('pengguna_peran');
        $nama=$nama_file;

        // dd($request->all());

        $result = Pengguna::create($request->all()+ ['pengguna_CV_KTP' => $nama]+ ['pengguna_status_CV' => '0']+ ['pengguna_status_wawancara' => '0']);
        // dd($result);
        $password = Hash::make($request->pengguna_password);
        $result->pengguna_password=$password;
        $result->pengguna_CV_KTP=$nama;
        if($role=='1'){
            $result->pengguna_status_CV="0";
            $result->pengguna_status_wawancara="0";
        }else{
            $result->pengguna_status_CV="1";
            $result->pengguna_status_wawancara="1";
        }
        // dd($request->all());
        // dd($result);
        $result->save();
        Alert::success('Succes', 'Akun Anda berhasil didaftarkan');
        return back();
    }
    public function storeKategori(Request $request)
    {
        $Kategori = KategoriKelas::where('pelajaran_id','=',$request->id)->get();
        return json_encode($Kategori);
    }
    public function storeGuru(Request $request)
    {
        $guru = Guru::where('pelajaran_id','=',$request->id)->with('punyaUser')->get();
        return json_encode($guru);
    }
    public function downloadfile(Request $request)
    {
        $dataTugas = Tugas::find($request->id);
        $kelas=$dataTugas->tugas_id;
        return Storage::disk('local')->download("DataKelas/PengumpulanTugas/$kelas/$request->namafile");
    }
    public function downloadallfile(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $datatugas = D_tugas::where('tugas_id','=',$request->id_tugas)->get();

        $pengumpulan=0;
        $datapengumpulan= D_tugas::where('tugas_id','=',$request->id_tugas)->where('url_pengumpulan','!=',null)->get();
        $pengumpulan=sizeof($datapengumpulan);
        if($pengumpulan==0){
            return back()->with("message", "Tidak ada File siswa yang dapat didownload");
        }
        // dd($datatugas);
        $fileName = 'TugasKelas'.$dataKelas->kelas_nama.'.zip';
        // dd(public_path());
        // File::delete(public_path().'/'.$fileName);
        // Storage::delete($fileName);
        $kelas=$dataKelas->kelas_kode;
        $zip = new \ZipArchive();


        if ($zip->open(storage_path($fileName), \ZipArchive::CREATE)== TRUE)
        {
            $files = File::files(storage_path("app/DataKelas/PengumpulanTugas/$request->id_tugas"));
            foreach ($files as $key => $value){
                $relativeName = basename($value);
                foreach ($datatugas as $item) {
                    if($item->url_pengumpulan==$relativeName){
                        $zip->addFile($value, $relativeName);
                    }else{
                    }
                }

            }
            $zip->close();
        }

        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }
}
