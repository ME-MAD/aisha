<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'from', 'to', 'teacher_id', 'group_type_id', 'age_type'];


    const GROUP_TYPES = ['kid', 'adult'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function groupStudents()
    {
        return $this->hasMany(GroupStudent::class, 'group_id');
    }

    public function groupType()
    {
        return $this->belongsTo(GroupType::class, 'group_type_id');
    }

    public function groupDays()
    {
        return $this->hasMany(GroupDay::class, "group_id");
    }

    public function studentLessons()
    {
        return $this->hasMany(StudentLesson::class, 'group_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'group_id');
    }

    public function checkIfGroupExceededGroupDaysLimit()
    {
        return ($this->groupType->days_num ?? 0) <= ($this->groupDays->count() ?? 0);
    }

    public function getRemainingGroupDaysCount()
    {
        return $this->groupType->days_num - $this->groupDays->count();
    }

    public function students()
    {
        return $this->hasManyThrough(
            Student::class,
            GroupStudent::class,
            'group_id',
            'id',
            'id',
            'student_id'
        );
    }
}