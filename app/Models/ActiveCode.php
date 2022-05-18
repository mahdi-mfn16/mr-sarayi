<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ActiveCode extends Model
{
    protected $fillable = [
        'user_id', 'video_id', 'code', 'actived',
    ];

    protected $table = 'active_codes';


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function video()
    {
        return $this->belongsTo(Video::class);
    }


    public function setCode($userId, $videoId)
    {
        $code = rand(10000000,99999999);
        $this->create([
            'code'=>$code,
            'user_id'=>$userId,
            'video_id'=>$videoId,
        ]);
        return $code;
    }


    public function getCode()
    {
        return $this->code;
    }


    public function existCode(User $user, Video $video)
    {
        return !! $this->where('user_id', $user->id)->where('video_id', $video->id)->first();
    }



    public function activateCode()
    {
        $this->update([
            'actived'=>1
        ]);
    }

    
    public function deactivateCode()
    {
        $this->update([
            'actived'=>0
        ]);
    }



    public function checkActived()
    {
        return !! $this or $this->actived;
    }

}
