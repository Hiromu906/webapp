<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('events')->insert([
                'title' => '命名の心得',
                'user_id' => 5,
                'start_time' => new DateTime(),
                'end_time' => new DateTime(),
                'location' => '北海道',
                'description' => '命名はデータを基準に考える',
                'send_at' => new DateTime(),
                'is_release' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
