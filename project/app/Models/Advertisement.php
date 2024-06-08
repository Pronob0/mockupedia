<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'company',
        'banner',
        'type',
        'status',
        'link',
        'position',
        'click',
        'impression',
        'start_date',
        'end_date',
        'duration',

    ];
    public $timestamps = false;
}
