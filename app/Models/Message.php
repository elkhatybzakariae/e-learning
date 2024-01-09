<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id_Mess';
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable = [
        'id_Mess',
        'id_U',
        'id_CertP',
    ];    
    public function certpasser(): BelongsTo
    {
        return $this->belongsTo(CertPasser::class, 'id_CertP');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_U');
    }

}
