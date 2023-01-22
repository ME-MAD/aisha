<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GroupDay extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'day'];

    protected $casts = [
        'day' => "object"
    ];


    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
}
