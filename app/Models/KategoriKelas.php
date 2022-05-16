<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class KategoriKelas extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table      = "kategorikelas";
    protected $primaryKey = "kategorikelas_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'pelajaran_id',
        'kategorikelas_nama',
        'kategorikelas_harga',
        'kategorikelas_pertemuan'
    ];

}
