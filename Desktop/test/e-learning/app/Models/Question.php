<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $primaryKey = 'id_Que';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_Que',
        'question',
        'questable_id',
    ];
    public function questable()
    {
        return $this->morphTo();
    }
    public function reponse(){
        return $this->hasMany(Reponse::class);
    }
}
