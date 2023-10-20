<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;
    protected $table = 'sous_categories';
    protected $primaryKey = 'id_SCat';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable = [
        'SCatName',
    ];
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
