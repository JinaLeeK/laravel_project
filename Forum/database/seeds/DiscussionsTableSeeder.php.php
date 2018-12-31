<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Discussion::create([
         'user_id'       => 1,
         'title'        => 'Create a RESTful API in Laravel App',
         'content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar pretium ipsum, malesuada hendrerit lacus venenatis quis. Nullam ultrices ac diam rhoncus mattis. Praesent lorem nisi, posuere ac orci vitae, tristique mattis ipsum. Cras suscipit quam pellentesque libero dignissim, sed mattis diam dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras porttitor sapien pellentesque orci dapibus pretium. Aliquam nec accumsan risus. Nullam gravida faucibus neque, a semper dolor vehicula a. Integer id massa in nisi venenatis elementum. Nulla vel nunc elit.',
         'slug'         => str_slug('Create a RESTful API in Laravel App'),
         'channel_id'   => 1
      ]);

      App\Discussion::create([
         'user_id'       => 1,
         'title'        => 'test discussion 2',
         'content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar pretium ipsum, malesuada hendrerit lacus venenatis quis. Nullam ultrices ac diam rhoncus mattis. Praesent lorem nisi, posuere ac orci vitae, tristique mattis ipsum. Cras suscipit quam pellentesque libero dignissim, sed mattis diam dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras porttitor sapien pellentesque orci dapibus pretium. Aliquam nec accumsan risus. Nullam gravida faucibus neque, a semper dolor vehicula a. Integer id massa in nisi venenatis elementum. Nulla vel nunc elit.',
         'slug'         => str_slug('test discussion 2'),
         'channel_id'   => 1
      ]);

      App\Discussion::create([
         'user_id'       => 2,
         'title'        => 'test discussion 3',
         'content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar pretium ipsum, malesuada hendrerit lacus venenatis quis. Nullam ultrices ac diam rhoncus mattis. Praesent lorem nisi, posuere ac orci vitae, tristique mattis ipsum. Cras suscipit quam pellentesque libero dignissim, sed mattis diam dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras porttitor sapien pellentesque orci dapibus pretium. Aliquam nec accumsan risus. Nullam gravida faucibus neque, a semper dolor vehicula a. Integer id massa in nisi venenatis elementum. Nulla vel nunc elit.',
         'slug'         => str_slug('Create a RESTful API in Laravel App'),
         'channel_id'   => 1
      ]);

      App\Discussion::create([
         'user_id'       => 1,
         'title'        => 'test discussion 4',
         'content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar pretium ipsum, malesuada hendrerit lacus venenatis quis. Nullam ultrices ac diam rhoncus mattis. Praesent lorem nisi, posuere ac orci vitae, tristique mattis ipsum. Cras suscipit quam pellentesque libero dignissim, sed mattis diam dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras porttitor sapien pellentesque orci dapibus pretium. Aliquam nec accumsan risus. Nullam gravida faucibus neque, a semper dolor vehicula a. Integer id massa in nisi venenatis elementum. Nulla vel nunc elit.',
         'slug'         => str_slug('test discussion 4'),
         'channel_id'   => 2
      ]);

      App\Discussion::create([
         'user_id'       => 1,
         'title'        => 'test discussion 5',
         'content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar pretium ipsum, malesuada hendrerit lacus venenatis quis. Nullam ultrices ac diam rhoncus mattis. Praesent lorem nisi, posuere ac orci vitae, tristique mattis ipsum. Cras suscipit quam pellentesque libero dignissim, sed mattis diam dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras porttitor sapien pellentesque orci dapibus pretium. Aliquam nec accumsan risus. Nullam gravida faucibus neque, a semper dolor vehicula a. Integer id massa in nisi venenatis elementum. Nulla vel nunc elit.',
         'slug'         => str_slug('test discussion 5'),
         'channel_id'   => 2
      ]);
      App\Discussion::create([
         'user_id'       => 2,
         'title'        => 'test discussion 6',
         'content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar pretium ipsum, malesuada hendrerit lacus venenatis quis. Nullam ultrices ac diam rhoncus mattis. Praesent lorem nisi, posuere ac orci vitae, tristique mattis ipsum. Cras suscipit quam pellentesque libero dignissim, sed mattis diam dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras porttitor sapien pellentesque orci dapibus pretium. Aliquam nec accumsan risus. Nullam gravida faucibus neque, a semper dolor vehicula a. Integer id massa in nisi venenatis elementum. Nulla vel nunc elit.',
         'slug'         => str_slug('test discussion 6'),
         'channel_id'   => 2
      ]);

      App\Discussion::create([
         'user_id'       => 2,
         'title'        => 'test discussion 7',
         'content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar pretium ipsum, malesuada hendrerit lacus venenatis quis. Nullam ultrices ac diam rhoncus mattis. Praesent lorem nisi, posuere ac orci vitae, tristique mattis ipsum. Cras suscipit quam pellentesque libero dignissim, sed mattis diam dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras porttitor sapien pellentesque orci dapibus pretium. Aliquam nec accumsan risus. Nullam gravida faucibus neque, a semper dolor vehicula a. Integer id massa in nisi venenatis elementum. Nulla vel nunc elit.',
         'slug'         => str_slug('test discussion 7'),
         'channel_id'   => 3
      ]);

        //
    }
}
