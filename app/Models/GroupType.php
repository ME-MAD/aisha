<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupType extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'name','price'];

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
}
