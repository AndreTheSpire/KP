<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "pengguna";
    protected $primaryKey = "pengguna_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at
    protected $appends = ['role_text'];

    protected $fillable = [
        'pengguna_nama',
        'pengguna_email',
        'pengguna_password',
        'pengguna_nohp',
        'pengguna_tanggallahir',
        'pengguna_alamat',
        'pengguna_jeniskelamin',
        'pengguna_peran',
        'pengguna_CV_KTP',
        'pengguna_status_CV',
        'pengguna_status_wawancara',
    ];

    public function getAuthPassword()
    {
        return $this->pengguna_password;
    }
}
