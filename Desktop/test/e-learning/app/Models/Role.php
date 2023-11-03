<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_R';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_R','role_name'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'id_R', 'id_U');
    }
}
