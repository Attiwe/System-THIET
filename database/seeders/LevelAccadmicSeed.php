<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelAccadmicSeed extends Seeder
{
    public function run(): void
    {
        DB::table('level_accademics')->delete();

        $level = [
            ['level_name' => 'اعدادي هندسه'],
            ['level_name' => 'الفرقه الاوله'],
            ['level_name' => 'الفرقه الثانيه'],
            ['level_name' => 'الفرقه الثالثه'],
            ['level_name' => 'الفرقه الرابعه'],
        ];

        DB::table('level_accademics')->insert($level);
    }
}