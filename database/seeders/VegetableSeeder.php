<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VegetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vegetables')->insert([
            [
                'name' => '大根',
                'img_path' => 'https://item-shopping.c.yimg.jp/i/l/keishin_vf-1147',
            ],
            [
                'name' => 'きゅうり',
                'img_path' => 'https://food-foto.jp/free/img/images_big_420/fd400161.jpg',
            ],
            [
                'name' => 'トマト',
                'img_path' => 'https://food-foto.jp/free/img/images_thumb/fd400603.jpg',
            ],
            [
                'name' => 'キャベツ',
                'img_path' => 'https://photo-room.net/wp-content/uploads/pr00044.jpg',
            ],
            [
                'name' => 'レタス',
                'img_path' => 'https://www.pakutaso.com/shared/img/thumb/9V9A5931_TP_V.jpg',
            ],
            [
                'name' => '白菜',
                'img_path' => 'https://forest17.com/e54/e54m_0433.jpg',
            ],
            [
                'name' => 'にんじん',
                'img_path' => 'https://st.depositphotos.com/1000141/2653/i/600/depositphotos_26536551-stock-photo-one-young-carrot.jpg',
            ],
            [
                'name' => 'ほうれん草',
                'img_path' => 'https://thumb.photo-ac.com/25/2559e31b3302b6ad3e88905918d8f1b3_t.jpeg',
            ],
            [
                'name' => 'ブロッコリー',
                'img_path' => 'https://www.photolibrary.jp/mhd1/img257/450-20120707113253196694.jpg',
            ],
            [
                'name' => 'ねぎ',
                'img_path' => 'https://www.photolibrary.jp/mhd6/img510/450-20170131172643332064.jpg',
            ],
        ]);
    }
}
