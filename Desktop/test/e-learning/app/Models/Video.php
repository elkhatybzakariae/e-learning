<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $primaryKey = 'id_V';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_V',
        'title',
        'aboutVideo',
        'lien',
        'id_Sess',
    ];

    public function media(){
        return $this->hasMany(Media::class,'id_V');
    }
    public function session(){
        return $this->belongsTo(Session::class, 'id_Sess');
    }
}
