<?php

use Illuminate\Database\Seeder;

class CheckpointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('checkpoints')->insert(array(

            array('event_id'=>1, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>'47.49186', 'lon'=>'-117.581902', 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>2, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>'47.489631', 'lon'=>'-117.585299', 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>3, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>'47.492384', 'lon'=>'-117.584431', 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>4, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>'47.492442', 'lon'=>'-117.581289', 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>5, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>'47.507068', 'lon'=>'-117.566846', 'qr'=>str_random(5), 'status'=>0),


        ));





    }
}
