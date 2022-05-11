<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillables = [
        'name',
        'show_name',
        'path',
        'likes',
        'length_time',
        'course_id',
        
];

public function course()
{
    return $this->belongsTo(Course::class);
}
}
