<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GroupDay extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'day', 'from_time', 'to_time'];
    protected $appends = ['from_time_formated', 'to_time_formated'];
    
    // protected function from(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => date('h:i', strtotime($value)),
    //     );
    // }

    // protected function to(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => date('h:i', strtotime($value)),
    //     );
    // }

    public function getFromTimeFormatedAttribute()
    {
        return date('h:i A', strtotime($this->from_time));
    }

    public function getToTimeFormatedAttribute()
    {
        return date('h:i A', strtotime($this->from_time));
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

}
