<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'title'];

    public function Subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
