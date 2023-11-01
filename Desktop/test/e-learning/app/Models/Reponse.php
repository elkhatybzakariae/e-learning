<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    protected $table = 'reponses';
    protected $primaryKey = 'id_R';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_R ',
        'reponse',
        'statusrep',
        'id_Que ',
    ];
   
    public function question(){
        return $this->belongsTo(Question::class,'id_Que');
    }
}
