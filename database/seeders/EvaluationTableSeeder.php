<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evaluations')->insert([
            "evaluation" => "好き",
        ]);
        DB::table('evaluations')->insert([
            "evaluation" => "普通",
        ]);
        DB::table('evaluations')->insert([
            "evaluation" => "嫌い",
        ]);
    }
}
