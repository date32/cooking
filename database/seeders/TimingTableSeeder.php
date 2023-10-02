<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('timings')->insert([
            "timing_name" => "朝食",
        ]);
        DB::table('timings')->insert([
            "timing_name" => "昼食",
        ]);
        DB::table('timings')->insert([
            "timing_name" => "夕食",
        ]);
        DB::table('timings')->insert([
            "timing_name" => "夜食・つまみ",
        ]);
        DB::table('timings')->insert([
            "timing_name" => "おやつ",
        ]);
    }
}
