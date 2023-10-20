<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_R';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['role_name'];
    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'id_R', 'id_U');
    }
}
