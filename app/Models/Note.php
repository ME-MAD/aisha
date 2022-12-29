<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';


    protected $casts = [
        'created_at' => 'date:Y-m-d',
    ];

    protected $fillable = [
        'notable_type',
        'notable_id',
        'notby_type',
        'notby_id',
        'note',
        'type'
    ];

    const TYPE = [
        'personal',
        'work',
        'social',
        'important'
    ];

    public function notableStudent()
    {
        return $this->morphTo(Student::class, 'notable_type', 'notable_id');
    }






    // student


    // public function scopeStudent($query)
    // {
    //     return $query->where('notable_type', Student::class);
    // }
}
