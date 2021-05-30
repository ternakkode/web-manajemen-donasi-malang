<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                "role_name" => "Superadmin"
            ],
            [
                "role_name" => "Publikasi"
            ],
            [
                "role_name" => "Bendahara"
            ],
            [
                "role_name" => "User"
            ]
        ];

        DB::table('roles')->insert($roles);
    }
}
