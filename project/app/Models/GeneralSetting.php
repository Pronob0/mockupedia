<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable=['mail_driver','mail_host','mail_port','mail_user','mail_pass','mail_encryption','from_email','from_name', 'fav', 'website_title', 'website_color', 'is_cookies','copyright_text','education','skill','service','portfolio','blog','contact','meta_title','meta_tags','meta_description','client_id','client_secret','sandbox_check','gif'];
}
