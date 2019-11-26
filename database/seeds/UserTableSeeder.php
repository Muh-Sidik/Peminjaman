<?php

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
        \App\User::insert([
            [
                'name'      => "Admin",
                'email'     => "admin@admin.com",
                'password'  => bcrypt("masukaja"),
                'level'     => 1,
                'created_at' => \Carbon\Carbon::now()

            ],
            [
                'name'      => "Kasir",
                'email'     => "kasir@kasir.com",
                'password'  => bcrypt("masukaja"),
                'level'     => 0,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name'      => "Kasir2",
                'email'     => "kasir2@kasir.com",
                'password'  => bcrypt("masukaja"),
                'level'     => 0,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name'      => "Kasir3",
                'email'     => "kasir3@kasir.com",
                'password'  => bcrypt("masukaja"),
                'level'     => 0,
                'created_at' => \Carbon\Carbon::now()
            ]

        ]);
    }
}
