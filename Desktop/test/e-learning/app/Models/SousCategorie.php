<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;
    protected $table = 'sous_categories';
    protected $primaryKey = 'id_SCat';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_SCat','SCatName','id_Cat'
    ];
    public function categorie(){
        return $this->belongsTo(Categorie::class,'id_Cat');
    }
    public function Sujet(){
        return $this->hasMany(Sujet::class);
    }
}
