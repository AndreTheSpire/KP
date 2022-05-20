<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Notifikasi extends Pivot
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table      = "notifikasi";
    protected $primaryKey = "notifikasi_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'notifikasi_jenis',
        'notifikasi_kelas',
        'notifikasi_jenis_id',
    ];

    public function punyaTugas()
    {
        return $this->belongsTo(Tugas::class,'notifikasi_jenis_id' , 'tugas_id');
    }
    public function punyaKelas()
    {
        return $this->belongsTo(Kelas::class, 'notifikasi_kelas', 'kelas_id');
    }
}
