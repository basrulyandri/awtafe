<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
         'name' => 'admin',
         'email' => 'digicrea08@gmail.com',
         'password' => bcrypt('admin'),
         'first_name' => 'Admin',
     ]);
    }
}
