<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            ['name' => '北海道地方'],
            ['name' => '東北地方'],
            ['name' => '関東地方'],
            ['name' => '中部地方'],
            ['name' => '近畿地方'],
            ['name' => '中国地方'],
            ['name' => '四国地方'],
            ['name' => '九州地方'],
        ]);
    }
}
