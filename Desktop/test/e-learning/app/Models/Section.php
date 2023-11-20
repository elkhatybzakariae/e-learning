<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $primaryKey = 'id_Sec';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_Sec',
        'Sec_Name',
        'id_C',
    ];

    public function session(){
        return $this->hasMany(Session::class,'id_Sec');
    }
    public function cour(){
        return $this->belongsTo(Cour::class, 'id_C');
    }
    public function quiz(){
        return $this->hasOne(Quiz::class,'id_Sec');
    }
}
