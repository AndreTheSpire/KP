<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "comment";
    protected $primaryKey = "comment_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'feed_id',
        'pengguna_id',
        'keterangan',
    ];

    public function Feed()
    {
        return $this->belongsTo(Feed::class, 'feed_id', 'feed_id');
    }
    public function pengirim()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id', 'pengguna_id');
    }
    public function Reply()
    {
        return $this->hasMany(Reply::class,'comment_id','comment_id');
    }
    public static function boot() {
        parent::boot();
        self::deleting(function($comment) { // before delete() method call this
             $comment->Reply()->each(function($reply) {
                $reply->delete(); // <-- direct deletion
             });
             // do the rest of the cleanup...
        });
    }
}
