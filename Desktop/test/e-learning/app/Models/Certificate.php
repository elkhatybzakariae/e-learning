<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $table = 'certificates';
    protected $primaryKey = 'id_Cert';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_Cert',
        'certificateName',
        'id_C',
    ];
    public function cour(){
        return $this->belongsTo(Cour::class, 'id_C');
    }
    public function questions()
    {
        return $this->morphMany(Question::class, 'questable');
    }
}
