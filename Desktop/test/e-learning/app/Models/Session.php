<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions';
    protected $primaryKey = 'id_Sess';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_Sess',
        'Sess_Name',
        'id_Sec',
    ];

    public function video(){
        return $this->hasMany(Video::class,'id_Sess');
    }
    public function section(){
        return $this->belongsTo(Section::class, 'id_Sec');
    }
}
