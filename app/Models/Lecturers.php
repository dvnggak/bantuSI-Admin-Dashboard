<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturers extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nidn',
        'name',
        'gender',
        'university',
        'faculty',
        'study_program',
        'functional_position',
        'employment_status',
        'highest_education',
        'status',
        'email',
        'phone_number',
    ];
}
