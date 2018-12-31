<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\User::create([
         'name'   => 'admin',
         'password'  => bcrypt('admin'),
         'email'     => 'grissom1015@gmail.com',
         'admin'     => 1,
         'avatar'    => asset('avatars/1.png')
      ]);
        //
    }
}
