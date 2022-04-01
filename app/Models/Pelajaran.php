<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Pelajaran extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table      = "pelajaran";
    protected $primaryKey = "pelajaran_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'pelajaran_nama',
    ];

}
