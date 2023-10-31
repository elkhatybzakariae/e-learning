<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    use HasFactory;
    protected $table = 'sujets';
    protected $primaryKey = 'id_Sj';
    public $incrementing=false;
    public $timestamps=false;
    protected $fillable = [
        'id_Sj',
        'SjName','id_SCat'
    ];
    public function souscategorie(){
        return $this->belongsTo(SousCategorie::class,'id_SCat');
    }
    public function cours(){
        return $this->hasMany(Cour::class);
    }
}
