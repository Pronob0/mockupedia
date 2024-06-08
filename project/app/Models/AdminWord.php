<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminWord extends Model
{
    use HasFactory;
    protected $fillable = [
        'word',
        'definition',
        'tags',
        'status',
        'like',
        'dislike',
        'alphabet','example',
        'username'
    ];
}
