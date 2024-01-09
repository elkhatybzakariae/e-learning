<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class CertPasser extends Model
{
    use HasFactory;
    protected $table = 'certpasser';
    protected $primaryKey = 'id_CertP';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_CertP',
        'passer',
        'valider',
        'QR',
        'id_U',
        'id_Cert',
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'id_U');
    }
    
    public function certificat()
    {
        return $this->belongsTo(Certificate::class, 'id_Cert');
    }
    public function message(): HasOne
    {
        return $this->hasOne(Message::class, 'id_CertP');
    }
//     public function message(): HasMany
// {
//     return $this->hasMany(Message::class, 'id_CertP');
// }

}
