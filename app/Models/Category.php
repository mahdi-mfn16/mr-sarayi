<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillables = [
        'name',
        'slug',
        'text',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
