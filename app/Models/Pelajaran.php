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
    public function punyaKategori()
    {
        return $this->hasMany(KategoriKelas::class, 'pelajaran_id', 'pelajaran_id');
    }
    public static function boot() {
        parent::boot();
        self::deleting(function($pelajaran) { // before delete() method call this
             $pelajaran->punyaKategori()->each(function($kat) {
                $kat->delete(); // <-- direct deletion
             });
             // do the rest of the cleanup...
        });
    }

}
