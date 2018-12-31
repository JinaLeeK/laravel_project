<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Reply::create([
         'user_id'        => 1,
         'discussion_id' => 1,
         'content'       => 'test reply 1'
      ]);
      App\Reply::create([
         'user_id'        => 2,
         'discussion_id' => 1,
         'content'       => 'test reply 2'
      ]);
      App\Reply::create([
         'user_id'        => 1,
         'discussion_id' => 1,
         'content'       => 'test reply 3'
      ]);
      App\Reply::create([
         'user_id'        => 1,
         'discussion_id' => 2,
         'content'       => 'test reply 4'
      ]);
        //
      App\Reply::create([
         'user_id'        => 2,
         'discussion_id' => 2,
         'content'       => 'test reply 5'
      ]);
        //
    }
}
