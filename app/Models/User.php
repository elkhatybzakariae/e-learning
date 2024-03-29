<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_U';
    public $incrementing = false;
    public $timestamps = false;
    protected $hidden = ['Password'];



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_U',
        'FirstName',
        'LastName',
        'Email',
        'Phone',
        'Password',
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // public function role()
    // {
    //     return $this->belongsTo(Role::class, 'id_R');
    // }
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'id_U', 'id_R');
    }

    public function cours()
    {
        return $this->hasMany(Cour::class);
    }
    public function videoterminer()
    {
        return $this->hasMany(VideoTerminer::class,'id_U');
    }
    public function message()
    {
        return $this->hasMany(Message::class,'id_U');
    }
    public function detailsUser()
    {
        return $this->hasOne(DetailsUser::class,'id_U');
    }

    // public function createPasswordResetToken()
    // {
    //     $token = str_random(60);
    //     $this->passwordReset()->updateOrCreate(
    //         ['email' => $this->email],
    //         ['token' => $token, 'created_at' => now()]
    //     );

    //     return $token;
    // }

    // public function passwordReset()
    // {
    //     return $this->hasOne(PasswordReset::class);
    // }
}
