<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Teacher extends Authenticatable
{
    use HasFactory;
    use LaratrustUserTrait;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $fillable = ['name','email', 'password', 'phone', 'birthday', 'avatar', 'qualification'];


    const AVATARS_PATH = 'images/teacher/avatars/';

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function($avatar){
                if($avatar && file_exists($this->getAvatarPath()))
                {
                    return asset(Teacher::AVATARS_PATH . $avatar);
                }
                return '';
            },
        );
    }

    function getAvatarPath(){
        if($this->getRawOriginal('avatar'))
        {
            return public_path(Teacher::AVATARS_PATH . $this->getRawOriginal('avatar'));
        }
        return '';
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'teacher_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'teacher_id');
    }

    public function groupStudents()
    {
        return $this->hasManyThrough(
            GroupStudent::class,
            Group::class,
            'teacher_id',
            'group_id',
            'id',
            'id'
        );
    }

    public function groupDays()
    {
        return $this->hasManyThrough(
            GroupDay::class,
            Group::class,
            'teacher_id',
            'group_id',
            'id',
            'id'
        );
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

    public function students()
    {
        return $this->hasManyDeep(
            Student::class,
            [Group::class, GroupStudent::class], // Intermediate models, beginning at the far parent (Country).
            [
               'teacher_id', // Foreign key on the "users" table.
               'group_id',    // Foreign key on the "posts" table.
               'id'     // Foreign key on the "comments" table.
            ],
            [
              'id', // Local key on the "countries" table.
              'id', // Local key on the "users" table.
              'student_id'  // Local key on the "posts" table.
            ]
        );
        // return $this->hasManyDeep(
        //     Comment::class,
        //     [User::class, Post::class], // Intermediate models, beginning at the far parent (Country).
        //     [
        //        'country_id', // Foreign key on the "users" table.
        //        'user_id',    // Foreign key on the "posts" table.
        //        'post_id'     // Foreign key on the "comments" table.
        //     ],
        //     [
        //       'id', // Local key on the "countries" table.
        //       'id', // Local key on the "users" table.
        //       'id'  // Local key on the "posts" table.
        //     ]
        // );
    }
}
