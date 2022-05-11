<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(! User::find(1)){
            User::create(
                [
                    'name'=>'mehdi',
                    'phone'=>'09365342296',
                    'password'=>bcrypt('123321mf'),
                    'email'=>'mehdimfn16@gmail.com',
                    'privilege'=>1,
                ]
            );
    
            User::create(
                [
                    'name'=>'mehdi2',
                    'phone'=>'09907700233',
                    'password'=>bcrypt('123321mf'),
                    'email'=>'mehdimfn162@gmail.com',
                    'privilege'=>0,
                ]
            );
        }
            
    }
}
