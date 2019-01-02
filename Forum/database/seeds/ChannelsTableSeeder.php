<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $channels = [
         ['title'  => 'Laravel', 'slug'=>'laravel' ],
         ['title' => 'CSS','slug'=>'css' ],
         ['title' => 'JavaScript','slug'=>'javascript' ],
         ['title' => 'Vuewjs','slug'=>'vuewjs' ],
         ['title' => 'Wordpress','slug'=>'wordpress' ],
         ['title' => 'Nodejs','slug'=>'nodejs' ],
         ['title' => 'Homestead','slug'=>'homestead' ]
      ];
      foreach($channels as $channel){
         App\Channel::create($channel);
      }

        //
    }
}
