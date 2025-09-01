<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelAccadmicSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('level_accadmics')->delete();

        $level = [
            [
                'level_name' => ' اعدادي هندسه',
            ],
            [
                'level_name' => ' الفرقه الاوله ',
            ],
            [
                'level_name' => ' الفرقه الثانيه',
            ],
            [
                'level_name' => ' الفرقه الثالثه',
            ],
            [
                'level_name' => ' الفرقه الرابعه',
            ],
            
        ];

        DB::table('level_accadmics')->insert($level);
    }
}
