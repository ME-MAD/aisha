<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name','book'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class,'subject_id');
    }

    protected function book(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "/files/subjects/" . $value,
        );
    }
}
