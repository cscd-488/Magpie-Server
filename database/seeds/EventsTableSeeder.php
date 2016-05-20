<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert(array(

           array('title'=>str_random(10), 'short_title'=>str_random(10), 'author'=>str_random(10),
               'description'=>str_random(10), 'image_src'=>'http://i.imgur.com/bsABe5c.jpg',
               'lat'=>'47.490519', 'lon'=>'-117.583796', 'qr'=>str_random(5)),

           array('title'=>str_random(10), 'short_title'=>str_random(10), 'author'=>str_random(10),
               'description'=>str_random(10), 'image_src'=>'http://i.imgur.com/bsABe5c.jpg',
               'lat'=>'47.489631', 'lon'=>'-117.585299', 'qr'=>str_random(5)),

           array('title'=>str_random(10), 'short_title'=>str_random(10), 'author'=>str_random(10),
               'description'=>str_random(10), 'image_src'=>'http://i.imgur.com/bsABe5c.jpg',
               'lat'=>'47.492224', 'lon'=>'-117.583201', 'qr'=>str_random(5)),

           array('title'=>str_random(10), 'short_title'=>str_random(10), 'author'=>str_random(10),
               'description'=>str_random(10), 'image_src'=>'http://i.imgur.com/bsABe5c.jpg',
               'lat'=>'47.49186', 'lon'=>'-117.581902', 'qr'=>str_random(5)),

           array('title'=>str_random(10), 'short_title'=>str_random(10), 'author'=>str_random(10),
               'description'=>str_random(10), 'image_src'=>'http://i.imgur.com/bsABe5c.jpg',
               'lat'=>'47.507375', 'lon'=>'-117.568042', 'qr'=>str_random(5)),

        ));
    }
}
