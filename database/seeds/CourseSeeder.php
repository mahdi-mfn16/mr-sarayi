<?php

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(! Course::find(1)){
            Course::create(
                [
                'name'=>'santoor1',
                'slug'=>'santoor1',
                'text'=>'santoor1santoor1santoor1santoor1',
                'description'=>'santoor1santoor1santoor1santoor1santoor1santoor1santoor1santoor1',
                'length_time'=>10,
                'likes'=>11,
                ]
            );
    
            Course::create(
                [
                'name'=>'santoor2',
                'slug'=>'santoor2',
                'text'=>'santoor2santoor1santoor1santoor1',
                'description'=>'santoor2santoor1santoor1santoor1santoor1santoor1santoor1santoor1',
                'length_time'=>20,
                'free'=>0,
                'price'=>'120000',
                'likes'=>20,
                ]
            );
        }
        
        
    }
}
