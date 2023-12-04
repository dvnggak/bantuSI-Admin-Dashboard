<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajoringProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'majoring',
        'faculty',
        'university',
        'program_type',
        'accreditation',
        'study_time',
        'vision',
        'mission',
        'student_competence',
        'description',
    ];
}
