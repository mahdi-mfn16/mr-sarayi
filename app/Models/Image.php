<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillables = [
        'name',
        'path',
    ];

   public function imagable()
   {
       return $this->morphTo();
   } 
}
