<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
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
    public function commentable()
    {
        return $this->morphTo();
    }
}
