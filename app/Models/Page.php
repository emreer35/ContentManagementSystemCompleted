<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = ['name', 'components'];

    public function components(): HasMany
    {
        return $this->hasMany(Component::class);
    }
    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
