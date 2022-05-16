<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
            'name',
            'slug',
            'text',
            'description',
            'length_time',
            'free',
            'price',
            'likes',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
