<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['from', 'to', 'teacher_id', 'group_type_id', 'age_type'];



    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function groupType()
    {
        return $this->belongsTo(GroupType::class, 'group_type_id');
    }
    public function groupDays()
    {
        return $this->hasMany(GroupDay::class, "group_id");
    }
}