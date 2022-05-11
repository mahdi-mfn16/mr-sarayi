<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(! Category::find(1)){
            Category::create(
                [
                'name'=>'aavaaz',
                'slug'=>'aavaaz',
                'text'=>'aavaaz_aavaaz_aavaaz',
                ]
            );
    
            Category::create(
                [
                'name'=>'saaz',
                'slug'=>'saaz',
                'text'=>'saaz_saaz_saaz',
                ]
            );
        }
        
    }
}
