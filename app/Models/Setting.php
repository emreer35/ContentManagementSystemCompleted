<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['web_setting', 'seo', 'navbar_content', 'footer_content', 'social_medias'];
}
