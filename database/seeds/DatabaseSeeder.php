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
            'cpf' => '11122233344',
            'phone_number' => '(38) 999999999',
        ]);

        \App\Models\Admin::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
