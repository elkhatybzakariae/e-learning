<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    use HasFactory;
    protected $table = 'sujets';
    protected $primaryKey = 'id_Sj';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable = [
        'SjName',
    ];
    public function souscategorie(){
        return $this->belongsTo(SousCategorie::class);
    }
    public function cours(){
        return $this->hasMany(Cour::class);
    }
}
