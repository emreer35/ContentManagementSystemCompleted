<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Component extends Model
{
    protected $table = 'components';
    protected $fillable = ['name', 'path'];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
