<?php

namespace Database\Seeders;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate(); // xóa hết trong CSDL
        Roles::create(["name"=>"admin"]);
        Roles::create(["name"=>"staff"]);
        Roles::create(["name"=>"user"]);

    }
}
