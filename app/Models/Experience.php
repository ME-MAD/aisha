<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'date', 'teacher_id'];

    protected $dates = ['date'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
