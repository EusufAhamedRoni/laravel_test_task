<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'role_id' => '1',
        'first_name' => 'Eusuf',
        'last_name' => 'Ahamed',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('pass@admin'),
      ]);

      DB::table('users')->insert([
        'role_id' => '2',
        'first_name' => 'Roni',
        'last_name' => 'User',
        'email' => 'user@gmail.com',
        'password' => bcrypt('pass@user'),
      ]);
    }
}
