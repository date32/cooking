<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            "material_name" => "豚肉",
            "material_type" => "肉類"
        ]);
        DB::table('materials')->insert([
            "material_name" => "にんじん",
            "material_type" => "野菜"
        ]);
        DB::table('materials')->insert([
            "material_name" => "玉ねぎ",
            "material_type" => "野菜"
        ]);
        DB::table('materials')->insert([
            "material_name" => "カレールー",
            "material_type" => "その他"
        ]);
        DB::table('materials')->insert([
            "material_name" => "じゃがいも",
            "material_type" => "野菜"
        ]);
        DB::table('materials')->insert([
            "material_name" => "白滝",
            "material_type" => "その他"
        ]);
        DB::table('materials')->insert([
            "material_name" => "キャベツ",
            "material_type" => "野菜"
        ]);
    }
}
