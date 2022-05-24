<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class D_tugas extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "d_tugas";
    protected $primaryKey = "D_tugas_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'tugas_id',
        'murid_id',
        'url_pengumpulan',
        'nilai'
    ];
    public function PunyaMurid()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'murid_id');
    }
    public function DariTugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id', 'tugas_id');
    }


}
