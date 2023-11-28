<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizPasser extends Model
{
    use HasFactory;
    protected $table = 'quizpasser';
    protected $primaryKey = 'id_QP';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_QP',
        'passer',
        'id_U',
        'id_Q',
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'id_U');
    }
    
    public function quiz()
    {
        return $this->morphMany(Quiz::class, 'id_Q');
    }
}
