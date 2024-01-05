<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertPasser extends Model
{
    use HasFactory;
    protected $table = 'certpasser';
    protected $primaryKey = 'id_Cert';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_CertP',
        'id_Cert',
        'passer',
        'valider',
        'id_U',
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'id_U');
    }
    
    public function certificat()
    {
        return $this->belongsTo(Certificate::class, 'id_Cert');
    }
}
