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
        'certificatetable_id',
        'certificatetable_type',
        // 'id_C',
    ];
    public function certificatetable(){
        return $this->morphTo();
    }
    public function questions()
    {
        return $this->morphMany(Question::class, 'questable');
    }
    
}
