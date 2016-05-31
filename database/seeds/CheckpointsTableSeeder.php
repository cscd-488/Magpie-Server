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


            array('event_id'=>1, 'title'=>'Computer Engineering Building', 'artist'=>'EWU', 'description'=>'Computer Engineering Building. Where all the cool kids are. Just kidding we are all awkward as hell',
                'image_src'=>'http://i.imgur.com/nb6hyFq.jpg', 'lat'=>47.489673, 'lon'=>-117.585672, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>1, 'title'=>'Patterson Hall', 'artist'=>'EWU', 'description'=>'Check out the newest building on campus! Cost way too much money and is full of English majors',
                'image_src'=>'http://i.imgur.com/cDllr1Y.jpg', 'lat'=>47.491957, 'lon'=>-117.582529, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>1, 'title'=>'Pence Union Building', 'artist'=>'EWU', 'description'=>'Come check out the PUB',
                'image_src'=>'http://i.imgur.com/9XIOUVk.jpg', 'lat'=>47.492059, 'lon'=>-117.583365, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>1, 'title'=>'JFK Library', 'artist'=>'EWU', 'description'=>'Look at some books!',
                'image_src'=>'http://i.imgur.com/BxPAvzH.jpg', 'lat'=>47.490862, 'lon'=>-117.583462, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>2, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.49186, 'lon'=>-117.581902, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>2, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.489631, 'lon'=>-117.585299, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>2, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.492384, 'lon'=>-117.584431, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>3, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.492442, 'lon'=>-117.581289, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>3, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.507068, 'lon'=>-117.566846, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>3, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.509068, 'lon'=>-117.566846, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>4, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.508068, 'lon'=>-117.566846, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>4, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.507068, 'lon'=>-117.566846, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>5, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.507078, 'lon'=>-117.566846, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>5, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.507088, 'lon'=>-117.566846, 'qr'=>str_random(5), 'status'=>0),

            array('event_id'=>5, 'title'=>str_random(10), 'artist'=>str_random(10), 'description'=>str_random(10),
                'image_src'=>'http://i.imgur.com/bsABe5c.jpg', 'lat'=>47.507098, 'lon'=>-117.566846, 'qr'=>str_random(5), 'status'=>0),
        ));





    }
}
