<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'أحمد محمد علي',
                'description' => 'كاتب ومؤلف متخصص في الأدب العربي الحديث، له العديد من المؤلفات في الشعر والنثر.',
            ],
            [
                'name' => 'فاطمة أحمد حسن',
                'description' => 'باحثة وأكاديمية متخصصة في الدراسات الإسلامية والتاريخ العربي.',
            ],
            [
                'name' => 'محمد سعد الدين',
                'description' => 'مؤلف وكاتب مقالات متخصص في العلوم التكنولوجية والذكاء الاصطناعي.',
            ],
            [
                'name' => 'عائشة محمود',
                'description' => 'كاتبة قصصية وروائية، حاصلة على عدة جوائز أدبية في مجال الأدب النسوي.',
            ],
            [
                'name' => 'يوسف عبدالله',
                'description' => 'مؤرخ وباحث في التاريخ الإسلامي، له العديد من المؤلفات في التاريخ والحضارة.',
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
