<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'publisher',
        'recipient',
        'batch',
        'start_date',
        'end_date',
        'desc',
        'link',
    ];
}
