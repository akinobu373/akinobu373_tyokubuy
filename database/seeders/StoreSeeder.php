<?php

namespace Database\Seeders;

use App\Models\vegetable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                'vegetable_id' => 1,
                'price' => 100,
                'address' => '〒028-7111 岩手県八幡平市大更第２５地割',
                'img_path' => 'images/01.jpeg',
                'latitude' => '39.9137890165379 ',
                'longitude' => '141.1006313809497',
            ],
            [
                'vegetable_id' => 2,
                'price' => 200,
                'address' => '〒028-7111 岩手県八幡平市大更第２５地割 113番地',
                'img_path' => 'images/02.jpeg',
                'latitude' => '39.9141162060101',
                'longitude' => '141.0996443256193',
            ],
        ]);
    }
}
