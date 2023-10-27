<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $primaryKey = 'id_Sec';
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable = [
        'Sec_Name',
        'id_C',
    ];

    public function session(){
        return $this->hasMany(Session::class);
    }
    public function cour(){
        return $this->belongsTo(Cour::class, 'id_C');
    }
}
