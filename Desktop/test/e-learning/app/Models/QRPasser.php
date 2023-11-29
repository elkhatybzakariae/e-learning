<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRPasser extends Model
{
    use HasFactory;
    protected $table = 'qrpasser';
    protected $primaryKey = 'id_QRP';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_QRP',
        'QRdata',
        'id_QP',
    ];
    
    public function quizpasser(){
        return $this->belongsTo(QuizPasser::class, 'id_QP');
    }
}
