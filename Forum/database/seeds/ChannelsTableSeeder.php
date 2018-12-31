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
         ['title'  => 'Laravel' ],
         ['title' => 'CSS' ],
         ['title' => 'JavaScript' ],
         ['title' => 'Vuewjs' ],
         ['title' => 'Wordpress' ],
         ['title' => 'Nodejs' ],
         ['title' => 'Homestead' ]
      ];
      foreach($channels as $channel){
         App\Channel::create($channel);
      }

        //
    }
}
