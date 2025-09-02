<?php

namespace Database\Seeders;

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

$departments = [
[
'name' => 'العلوم الاساسية',
'description' => 'Description 1',
'requerd_file' => 'file1.pdf',
'dapart_image' => 'science.jpg',
'depart_vision' => 'يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا
واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع',
'depart_massage' => 'يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا
واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع',
'is_active' => true,
],
[
'name' => 'هندسة مدنية',
'description' => 'Description 2',
'requerd_file' => 'file2.pdf',
'dapart_image' => 'civil.jpg',
'depart_vision' => 'يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا
واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع',
'depart_massage' => 'يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا
واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع',
'is_active' => true,
],
[
'name' => 'هندسة كيميائية',
'description' => '--',
'requerd_file' => 'file3.pdf',
'dapart_image' => 'chemical.jpg',
'depart_vision' => 'يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا
واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع',
'depart_massage' => 'يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا
واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع',
'is_active' => false,
],
[
'name' => 'هندسة الاتصالات والحاسبات',
'description' => 'Description 4',
'requerd_file' => 'file4.pdf',
'dapart_image' => 'communication.jpg',
'depart_vision' => 'يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا
واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع',
'depart_massage' => 'يسعى البرنامج الى تخريج مهندسين قادرون على البحث والابتكار فى مجال هندسة التشييد والبناء محليا
واقليميا ودوليا مما يساهم فى نهوض الصناعة ورفاهية المجتمع',
'is_active' => true,
],
];

DB::table('departments')->insert($departments);
}
}