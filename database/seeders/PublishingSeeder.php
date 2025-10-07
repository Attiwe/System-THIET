<?php

namespace Database\Seeders;

use App\Models\Publishing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublishingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishings = [
            [
                'publishing_name' => 'دار الشروق للنشر والتوزيع',
                'phone' => '+20 2 3334 5678',
                'publishing_description' => 'دار نشر رائدة في مصر والعالم العربي، متخصصة في نشر الكتب الأدبية والعلمية والتراثية.',
            ],
            [
                'publishing_name' => 'مكتبة الأسرة',
                'phone' => '+20 2 2345 6789',
                'publishing_description' => 'دار نشر تعليمية متخصصة في الكتب المدرسية والمراجع العلمية للطلاب والباحثين.',
            ],
            [
                'publishing_name' => 'دار المعارف',
                'phone' => '+20 2 3456 7890',
                'publishing_description' => 'إحدى أعرق دور النشر في مصر، تأسست عام 1890 وتخصصت في نشر التراث العربي والإسلامي.',
            ],
            [
                'publishing_name' => 'دار نهضة مصر',
                'phone' => '+20 2 4567 8901',
                'publishing_description' => 'دار نشر حديثة متخصصة في الكتب التقنية والبرمجة والذكاء الاصطناعي.',
            ],
            [
                'publishing_name' => 'دار الكتب العلمية',
                'phone' => '+20 2 5678 9012',
                'publishing_description' => 'دار نشر أكاديمية متخصصة في نشر البحوث العلمية والدراسات الأكاديمية.',
            ],
            [
                'publishing_name' => 'مؤسسة هنداوي للتعليم والثقافة',
                'phone' => '+20 2 6789 0123',
                'publishing_description' => 'مؤسسة غير ربحية تهدف إلى نشر المعرفة والثقافة العربية من خلال الكتب الرقمية والمطبوعة.',
            ],
        ];

        foreach ($publishings as $publishing) {
            Publishing::create($publishing);
        }
    }
}
