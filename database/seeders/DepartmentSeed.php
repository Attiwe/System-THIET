<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->delete();
        $department = [
            [
                'name' => 'اعدادي هندسة',
                'description' => 'Description 1',
                'depart_vision' => 'Vision 1',
                'depart_massage' => 'Message 1',
            ],
            [
                'name' => ' هندسة  المدنيه ',
                'description' => 'Description 2',
                'depart_vision' => ' " " يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع " " ',
                'depart_massage' => ' " يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع " " ',
            ],
            [
                'name' => 'هندسة الكميائيه',
                'description' => '--',
                'depart_vision' => ' " " يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع " " ',
                'depart_massage' => ' " يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع " " ',
            ],
            [
                'name' => ' هندسة  الاتصالات ',
                'description' => 'Description 2',
                'depart_vision' => ' " " يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع " " ',
                'depart_massage' => ' " يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع " " ',
            ],
        ];
        DB::table('departments')->insert($department);
    }
}
