<?php

namespace App\Http\Controllers;

use App\Models\D_tugas;
use App\Models\Guru;
use App\Models\KategoriKelas;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Notifikasi;
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
        // $dataUser = Pengguna::get();
        // dd($dataUser);
        return view("pages.essential.login");
    }
    public function GoToLanding()
    {
        return view("pages.essential.landing");
    }
    public function GoToProfile()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $roleuser=Auth::guard('satpam_pengguna')->user()->pengguna_peran;
        if($roleuser==1){
            $idguruuser=Auth::guard('satpam_pengguna')->user()->adalahGuru->guru_id;
            $datasebagaiguru=Kelas::where('guru_id','=',$idguruuser)->get();

            $daftarkelasid=[];
            foreach ($datasebagaiguru as $guru) {
                $daftarkelasid[]=$guru->kelas_id;
            }
            $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        }else{
            $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
            $daftarkelasid=[];
            foreach ($datasebagaimurid as $murid) {
                $daftarkelasid[]=$murid->kelas_id;
            }
            $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        }
        $peranuser=Auth::guard('satpam_pengguna')->user()->pengguna_peran;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();

        if($peranuser==1){
            return view("pages.Guru.profile",[
                'title' => "tugas",
                "dataKategori" => $dataKategori,
                "dataNotifikasi"=>$dataNotifikasi,
                "dataPelajaran" => $dataPelajaran,
            ]);
        }else{
            return view("pages.Murid.profile",[
                'title' => "tugas",
                "dataKategori" => $dataKategori,
                "dataNotifikasi"=>$dataNotifikasi,
                "dataPelajaran" => $dataPelajaran,
            ]);
        }

    }

    public function DoupdateProfile(Request $request)
    {

        $dataUser = Auth::guard('satpam_pengguna')->user();
        $nama_file="kosong";
        $file = $request->file('pengguna_photo');



            if($file){
                $nama_expansion = $file->getClientOriginalExtension();

                if ($nama_expansion=="jpg"||$nama_expansion=="png"||$nama_expansion=="jpeg") {

                }else{
                    Alert::warning('PERINGATAN', 'extension file harus image');
                    return back();
                }

                $nama_file=$dataUser->pengguna_id.".".$nama_expansion;

                $dataUser->pengguna_nama=$request->pengguna_nama;
                $dataUser->pengguna_alamat=$request->pengguna_alamat;
                $dataUser->pengguna_nohp=$request->pengguna_nohp;
                $dataUser->pengguna_photo=$nama_file;
                $dataUser->save();
                // $request->file('pengguna_photo')->storeAs('upload/'.$dataUser->pengguna_id,$nama_file, 'public');
                $request->file('pengguna_photo')->move(public_path('/upload'), $nama_file);

            }else{
                $dataUser->pengguna_nama=$request->pengguna_nama;
                $dataUser->pengguna_alamat=$request->pengguna_alamat;
                $dataUser->pengguna_nohp=$request->pengguna_nohp;
                // $dataUser->pengguna_photo=$nama;
                $dataUser->save();
            }

        return back();

        // dd($request->all());
        // $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        // $dataPelajaran = Pelajaran::get();
        // $dataKategori = KategoriKelas::get();
        // return view("pages.essential.profile",[
        //     'title' => "tugas",
        //     "dataKategori" => $dataKategori,
        //     "dataPelajaran" => $dataPelajaran,
        // ]);
    }

    public function UpdatePassword(Request $request)
    {
        $dataUser = Auth::guard('satpam_pengguna')->user();
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $passuser=Auth::guard('satpam_pengguna')->user()->pengguna_password;
        $peranuser=Auth::guard('satpam_pengguna')->user()->pengguna_peran;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        if(Hash::check($request->current_password, $passuser)) {
            if($request->new_password==$request->confirm_new_password){
                $password = Hash::make($request->new_password);
                $dataUser->pengguna_password=$password;
                $dataUser->save();
                Alert::success('Berhasil', 'Password Berhasil DIubah');
                return back();
            }
            Alert::warning('PERINGATAN', 'new password dan confirm new password tidak sesuai');
            return back();
        } else {
            Alert::warning('PERINGATAN', 'current password salah');
            return back();
        }



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

        $result = Pengguna::create($request->all()+ ['pengguna_CV_KTP' => $nama]+ ['pengguna_status_CV' => '0']+ ['pengguna_status_wawancara' => '0']+ ['pengguna_photo' => 'kosong.jpg']);
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
        $fileName = 'TugasKelas'.$dataKelas->kelas_nama.'.zip';
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
                    }
                }
            }
            $zip->close();
        }
        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }
}
