<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const AVATARS_PATH = 'images/user/avatars/';

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function($avatar){
                if($avatar && file_exists($this->getAvatarPath()))
                {
                    return asset(User::AVATARS_PATH . $avatar);
                }
                return '';
            },
        );
    }

    function getAvatarPath(){
        if($this->getRawOriginal('avatar'))
        {
            return public_path(User::AVATARS_PATH . $this->getRawOriginal('avatar'));
        }
        return '';
    }



    public function role()
    {
        return $this->hasOneThrough(
            Role::class,
            RoleUser::class,
            'user_id',
            'id',
            'id',
            'role_id');
    }

    public function rolePermissions()
    {
        return $this->hasMany(PermissionRole::class, 'role_id');
    }
}
