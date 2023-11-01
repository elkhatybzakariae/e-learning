<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    protected $primaryKey = 'id_Q';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_Q',
        'quizName',
        'id_Sec',
    ];
    
    public function section(){
        return $this->belongsTo(Section::class, 'id_Sec');
    }
    
    public function questions()
    {
        return $this->morphMany(Question::class, 'questable');
    }
}
