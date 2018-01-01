<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('secret'),
        ]);

        \App\Models\Admin::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
