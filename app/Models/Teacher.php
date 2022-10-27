<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'birthday', 'qualification'];


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
}