<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranMurid extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table      = "PendaftaranMurid";
    protected $primaryKey = "pendaftaranmurid_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        "pendaftaranmurid_id",
        'pengguna_id',
        'pelajaran_id',
        'kategorikelas_id',
        'pendaftaranmurid_status',
        'pendaftaranmurid_buktibayar'
    ];

    public function PunyaUser()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id', 'pengguna_id');
    }
    public function PunyaKategori()
    {
        return $this->belongsTo(KategoriKelas::class, 'kategorikelas_id', 'kategorikelas_id');
    }
    public function PunyaPelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'pelajaran_id', 'pelajaran_id');
    }
}
