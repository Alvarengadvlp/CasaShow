<?php

use Illuminate\Database\Seeder;
Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'rafael alvarenga',
            'email' => 'rafael@gmail.com',
            'password' => password_hash('lumia820',1),
        ]);
    }
}
