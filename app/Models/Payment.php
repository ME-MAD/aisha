<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'group_id', 'amount', 'month', 'paid'];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function scopePayments($query)
    {
        if(getGuard() == 'admin')
        {
            return $query->select([
                'payments.id',
                'student_id',
                'group_id',
                'amount',
                'month',
                'paid',
            ]);
        }
        else if(getGuard() == 'teacher')
        {
            return Auth::guard(getGuard())->user()->Payments()->select([
                'payments.id',
                'student_id',
                'group_id',
                'amount',
                'month',
                'paid',
            ])->getQuery();
        }
        else if(getGuard() == "student")
        {
            return Auth::guard(getGuard())->user()->payments()->select([
                'payments.id',
                'student_id',
                'group_id',
                'amount',
                'month',
                'paid',
            ])->getQuery();

        }
    }
}