<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id_Cat';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable = [
        'CatName',
    ];
    public function sousCategorie(){
        return $this->hasMany(SousCategorie::class);
    }
}
