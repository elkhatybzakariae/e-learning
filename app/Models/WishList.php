<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ['id','id_U','id_C'];
    public function cour()
    {
        return $this->belongsTo(Cour::class, 'id_C');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_U');
    // }
}
