<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoTerminer extends Model
{
    use HasFactory;

    protected $table = 'videoterminer';
    protected $primaryKey = 'id_VT';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_VT',
        'terminer',
        'id_V',
        'id_U',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_U');
    }
    public function video(){
        return $this->belongsTo(Video::class, 'id_V');
    }
}
