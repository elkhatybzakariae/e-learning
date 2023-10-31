<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $primaryKey = 'id_V';
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable = [
        'title',
        'aboutVideo',
        'lien',
        'id_Sess',
    ];

    public function media(){
        return $this->hasMany(Media::class);
    }
    public function session(){
        return $this->belongsTo(Session::class, 'id_Sess');
    }
}
