<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $primaryKey = 'id_M';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_M',
        'mediaName',
        'path',
        'id_V',
    ];
    public function video(){
        return $this->belongsTo(Video::class, 'id_V');
    }
}
