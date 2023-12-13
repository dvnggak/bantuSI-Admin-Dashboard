<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'desc',
        'file',
    ];
}
