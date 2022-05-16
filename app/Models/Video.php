<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model
{
    protected $fillable = [
        'name',
        'show_name',
        'path',
        'likes',
        'episode',
        'length_time',
        'course_id',
        
];


public function upload($video, $relatedTable, $relatedId)
{
    $name = hash('ripemd160', Str::random(8)).'_'.$video->getClientOriginalName();
    $path = $video->storeAs('videos'.'/'.$relatedTable.'/'.$relatedId, $name, 'public_only');
    return [$name,$path];
}



public function course()
{
    return $this->belongsTo(Course::class);
}

}
