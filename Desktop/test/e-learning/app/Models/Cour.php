<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $table = 'cours';
    protected $primaryKey = 'id_C';
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable = [
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
    public function user(){
        return $this->hasMany(User::class);
    }
    public function sujet(){
        return $this->belongsTo(Sujet::class, 'id_Sj');
    }
}
