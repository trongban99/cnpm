<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\Users;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users::truncate();

        $adminRoles =Roles::where('name','admin')->first();
        $staffRoles =Roles::where('name','staff')->first();
        $userRoles =Roles::where('name','student')->first();

        $user =Users::create([
            'User_acount'=>'ban456',
            'User_password'=>md5('123456'),
            'User_name'=>'ban456',
            'Date_of_birth'=>'1999-11-11',
            'User_sex'=>'1',
            'User_address'=>'Ha noi',
            'User_email'=>'ban456@gmail.com',
            'User_folk'=>'Kinh',
            'User_phone'=>'4561234',
            'User_image'=>'avatar2.png'
        ]);
        $user->roles()->attach($adminRoles);
    }
}
