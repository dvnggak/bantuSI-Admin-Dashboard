<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'name',
        'email',
        'phone_number',
        'first_name',
        'last_name',
        'gender',
        'batch',
        'faculty',
        'study_program',
    ];
}
