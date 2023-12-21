<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $table = 'panier';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ['id','id_U','id_C'];
    public function cour()
    {
        return $this->belongsTo(Cour::class, 'id_C');
    }
}
