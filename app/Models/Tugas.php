<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tugas extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "tugas";
    protected $primaryKey = "tugas_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'kelas_id',
        'tugas_nama',
        'tanggat_waktu',
        'tugas_keterangan',
        'lampiran',
        'status',
    ];

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }
    public function hasiltugas()
    {
        return $this->belongsTo(NilaiTugasMurid::class, 'tugas_id', 'tugas_id');
    }
    public function nilaiTugas()
    {
        return $this->hasMany(NilaiTugasMurid::class,'tugas_id','tugas_id');
    }


}
