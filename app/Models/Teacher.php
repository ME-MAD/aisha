<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'birthday','qualification', 'note'];


    public function experiences()
    {
        return $this->hasMany(Experience::class,'teacher_id');
    }
}
