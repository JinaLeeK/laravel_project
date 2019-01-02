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
         'email'     => 'admin@test.com',
         'admin'     => 1,
         'avatar'    => asset('avatars/1.png'),
         'points'    => 50
      ]);
        //
      App\User::create([
         'name'   => 'Jina Lee',
         'password'  => bcrypt('test'),
         'email'     => 'test@test.com',
         'admin'     => 0,
         'avatar'    => asset('avatars/2.png'),
         'points'    => 50
      ]);
        //
    }
}
