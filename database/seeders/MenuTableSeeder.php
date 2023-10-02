<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            "menu_name" => "カレー",
        ]);
        DB::table('menus')->insert([
            "menu_name" => "肉じゃが",
        ]);
        DB::table('menus')->insert([
            "menu_name" => "野菜炒め",
        ]);
    }
}
