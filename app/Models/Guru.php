<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Guru extends Pivot
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table      = "guru";
    protected $primaryKey = "guru_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'kelas_id',
        'pengguna_id',
        'pelajaran_id',
        'jeniskelas_id'
    ];

    public function PunyaUser()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id', 'pengguna_id');
    }
}
