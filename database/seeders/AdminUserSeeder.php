<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $data=[
            array(
                'number'=>'01521451354',
                'name'=>'Noman',
                'email'=>'noman.cse19@gmail.com',
                'is_active'=>1,
                'user_type'=>1, //1= Admin User , 2= Parent User
                'password'=>Hash::make('noman131905'),
            ),
            array(
                'number'=>'01772068908',
                'name'=>'Jahidul Islam ',
                'email'=>'bdnoman7@gmail.com',
                'is_active'=>1,
                'user_type'=>2, //1= Admin User , 2= Parent User
                'password'=>Hash::make('noman131905'),
            ),
        ];


        User::insert($data);


    }





}
