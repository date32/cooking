<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => "てつろう",
        ]);
        DB::table('users')->insert([
            "name" => "えみ",
        ]);
        DB::table('users')->insert([
            "name" => "しょうりゅう",
        ]);
        DB::table('users')->insert([
            "name" => "みこと",
        ]);
        DB::table('users')->insert([
            "name" => "ことは",
        ]);
    }
}
