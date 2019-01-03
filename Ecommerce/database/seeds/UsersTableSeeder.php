<?php

use Illuminate\Database\Seeder;
use App\User;

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
         'name'      => 'test',
         'email'     => 'test@test.com',
         'password'  => bcrypt('test')
      ]);

      App\User::create([
         'name'      => 'admin',
         'email'     => 'admin@test.com',
         'admin'     => 1,
         'password'  => bcrypt('admin')
      ]);

        //
    }
}
