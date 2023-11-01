<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $table = 'cours';
    protected $primaryKey = 'id_C';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_C',
        'title',
        'info',
        'description',
        'Prerequisites',
        'price',
        'lastmodi',
        'coupon',
        'valider',
        'id_U',
        'id_Sj',
    ];
    // public function user(){
    //     return $this->hasMany(User::class);
    // }
    public function section(){
        return $this->hasMany(Section::class);
    }
    public function certificate(){
        return $this->hasOne(Certificate::class);
    }
    public function sujet(){
        return $this->belongsTo(Sujet::class, 'id_Sj');
    }
}
