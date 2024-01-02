<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsUser extends Model
{
    use HasFactory;

    protected $table = 'details_user';
    public $timestamps = true;
    protected $fillable = [
        'id_U',
        'info',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_U');
    }
}
