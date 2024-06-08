<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'status',
        'category_id',
        'view',
        'source',
        'tags',
        'meta_title',
        'meta_keyword',
        'meta_description',

    ];

    public function category()
    {
    	return $this->belongsTo('App\Models\BlogCategory','category_id')->withDefault();
    } 
}
