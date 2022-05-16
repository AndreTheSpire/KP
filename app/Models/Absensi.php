<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Absensi extends Pivot
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table      = "absensi";
    protected $primaryKey = "absen_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'minggu',
        'murid_id',
        'kelas_id',
        'status_absen',
    ];

    public function punyaMurid()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'murid_id');
    }
    public function punyaKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }
}
