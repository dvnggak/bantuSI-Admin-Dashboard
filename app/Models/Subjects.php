<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_code',
        'subject_name',
        'subject_type',
        'subject_credit',
        'subject_lecturer',
        'subject_day',
        'subject_time',
        'subject_enrollment_code',
        'subject_enrollment_link',
        'subject_group_link',
    ];
}
