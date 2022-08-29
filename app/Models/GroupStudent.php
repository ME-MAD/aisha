<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'group_id'];


    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
}
