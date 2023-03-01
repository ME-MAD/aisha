<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
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
            [Group::class, GroupStudent::class], 
            [
               'teacher_id', 
               'group_id',    
               'id'     
            ],
            [
              'id',
              'id', 
              'student_id' 
            ]
        );
    }

    //$this -> group -> studentLesson -> syllabus
    public function syllabus()
    {
        return $this->hasManyDeep(
            syllabus::class,
            [Group::class, StudentLesson::class], 
            [
               'teacher_id', 
               'group_id',
               'student_lesson_id'
            ],
            [
              'id',
              'id', 
              'id'
            ]
        );
    }


    //$this -> group -> groupSubject -> subject -> lesson
    public function lessons()
    {
        return $this->hasManyDeep(
            Lesson::class,
            [Group::class, GroupSubject::class , Subject::class], 
            [
               'teacher_id', 
               'group_id',
               'id',
               'subject_id',
            ],
            [
              'id',
              'id', 
              'subject_id',
              'id',
            ]
        );
    }


    public function scopeTeachers($query)
    {
        if(getGuard() == 'admin')
        {
            return $query->select([
                'teachers.id', 'teachers.name', 'avatar', 'birthday','email','qualification','phone'
            ]);
        }
        else if(getGuard() == 'teacher')
        {
           
            return $query->where('id', Auth::guard(getGuard())->user()->id);
        }
        else if(getGuard() == "student")
        {
            return Auth::guard(getGuard())->user()->teachers()->select([
                'teachers.id', 'teachers.name', 'avatar', 'birthday','email','qualification','phone'
            ])->getQuery();
        }
    }

    public function scopeUnFinishedSyllabus()
    {
        return $this->syllabus()->where('syllabi.finished',false);
    }

    public function groupSubjects()
    {
        return $this->hasManyThrough(
            GroupSubject::class,
            Group::class,
            'teacher_id',
            'group_id',
            'id',
            'id'
        );
    }

    public function Payments()
    {
        return $this->hasManyThrough(
            Payment::class,
            Group::class,
            'teacher_id',
            'group_id',
            'id',
            'id'
        );
    }
}
