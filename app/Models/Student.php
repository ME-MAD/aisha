<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\LaratrustUserTrait;

class Student extends Authenticatable
{
    use HasFactory;
    use LaratrustUserTrait;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $fillable = ['name', 'email', 'password', 'birthday', 'phone', 'qualification', 'avatar'];


    const AVATARS_PATH = 'images/student/avatars/';

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function ($avatar) {
                if ($avatar && file_exists($this->getAvatarPath())) {
                    return asset(Student::AVATARS_PATH . $avatar);
                }
                return '';
            },
        );
    }

    function getAvatarPath()
    {
        if ($this->getRawOriginal('avatar')) {
            return public_path(Student::AVATARS_PATH . $this->getRawOriginal('avatar'));
        }
        return '';
    }

    public function groupStudents()
    {
        return $this->hasMany(GroupStudent::class, 'student_id');
    }

    //$this -> studentLesson -> syllabus
    public function syllabus()
    {
        return $this->hasManyDeep(
            syllabus::class,
            [StudentLesson::class], 
            [
               'student_id',
               'student_lesson_id'
            ],
            [
              'id', 
              'id'
            ]
        );
    }

    public function studentLessons()
    {
        return $this->hasMany(StudentLesson::class, 'student_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'student_id');
    }

    public function checkPaid(int $group_id, string $month)
    {
        return $this->payments->where('group_id', $group_id)->where('month', $month)->first()->paid ?? false;
    }

    public function groups()
    {
        return $this->hasManyThrough(
            Group::class,
            GroupStudent::class,
            'student_id',
            'id',
            'id',
            'group_id'
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

    public function subjects()
    {
        return $this->hasManyDeep(
            Subject::class,
            [GroupStudent::class, Group::class, GroupSubject::class], 
            [
               'student_id', 
               'id',    
               'group_id',     
               'id',     
            ],
            [
              'id', 
              'group_id', 
              'id',
              'subject_id',
            ]
        );
    }

    public function scopeStudents($query)
    {
        if(getGuard() == 'admin')
        {
            return $query->select([
                'students.id', 'students.name', 'avatar', 'birthday','email','qualification','phone'
            ]);
        }
        else if(getGuard() == 'teacher')
        {
            return Auth::guard(getGuard())->user()->students()->select([
                'students.id', 'students.name', 'avatar', 'birthday','email','qualification','phone'
            ])->getQuery();
        }
        else if(getGuard() == "student")
        {
            return $query->where('id', Auth::guard(getGuard())->user()->id);
        }
    }

   //this -> groupStudent -> group -> teacher
    public function teachers()
    {
        return $this->hasManyDeep(
            Teacher::class,
            [GroupStudent::class, Group::class], 
            [
               'student_id', 
               'id',    
               'id'   
            ],
            [
              'id', 
              'group_id', 
              'teacher_id'  
            ]
        );
    }

   //this -> groupStudent -> group -> teacher -> experiences
    public function teacherExperiences()
    {
        return $this->hasManyDeep(
            Experience::class,
            [GroupStudent::class, Group::class,Teacher::class], 
            [
               'student_id', 
               'id',    
               'id',
               'teacher_id'   
            ],
            [
              'id', 
              'group_id', 
              'teacher_id',
              'id'  
            ]
        );
    }


     //this -> groupStudent -> group -> groupDays
     public function groupDays()
     {
         return $this->hasManyDeep(
             GroupDay::class,
             [GroupStudent::class, Group::class], 
             [
                'student_id', 
                'id',    
                'group_id'   
             ],
             [
               'id', 
               'group_id', 
               'id'  
             ]
         );
     }

    public function scopeUnFinishedSyllabus($query)
    {
        return $this->syllabus()->where('syllabi.finished',false);
    }

    //$this -> groupStudent -> Group -> GroupSubject -> Subject -> lesson
      public function lessons()
      {
          return $this->hasManyDeep(
              Lesson::class,
              [GroupStudent::class , Group::class , GroupSubject::class , subjects::class], 
              [
                 'student_id', 
                 'id', 
                 'group_id', 
                 'id', 
                 'subject_id', 
              ],
              [
                'id',
                'group_id',
                'id',
                'subject_id',
                'id',
              ]
          );
      }
  
}
