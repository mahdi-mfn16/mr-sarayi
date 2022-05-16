<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class Image extends Model
{
    protected $fillable = [
        'name',
        'path',
    ];

   public function imagable()
   {
       return $this->morphTo();
   } 


   public function upload($image, $belongModel, $tableName)
   {
       $name = hash('ripemd160', Str::random(8)).'_' .$image->getClientOriginalName();
       $path = $image->storeAs($tableName, $name, 'public_only');
       $image= $this->create([
           'name'=>$name,
           'path'=>'/uploads/'.$path,
       ]);

       $belongModel->image()->save($image);
   }
}
