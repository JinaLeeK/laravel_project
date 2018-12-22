<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = App\User::create([
                  'name'      => 'jina',
                  'password'  => bcrypt('password'),
                  'email'     => 'test@test.com',
                  'admin'     => 1
               ]);

      App\Profile::create([
         'user_id'   => $user->id,
         'about'     => 'Lorem ipsum dolor',
         'facebook'  => 'facebook.com',
         'youtube'   => 'youtube.com',
         'avatar'    => 'uploads/avatars/1.png'
      ]);
    }
}
