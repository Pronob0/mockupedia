<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'title',
        'description',
        'total_donate',
        'slogan',
        'amount',
        'image',
        'end_date',
        'status',
    ];
}
