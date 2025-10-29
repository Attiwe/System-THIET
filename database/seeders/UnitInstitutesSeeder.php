<?php

namespace Database\Seeders;

use App\Models\UnitInstitutes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitInstitutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitInstitutes = [
            [
                'vision' => 'أن نكون رائدين في تقديم خدمات تعليمية وتدريبية متميزة تساهم في بناء جيل من المهندسين المؤهلين علمياً وعملياً، ونسعى لتحقيق التميز في مجال الهندسة والتكنولوجيا من خلال برامج تعليمية متطورة وشراكات استراتيجية مع القطاع الصناعي.',
                'message' => 'نسعى لتقديم تعليم هندسي متميز يواكب التطورات التكنولوجية الحديثة، ونساهم في إعداد مهندسين قادرين على مواجهة التحديات المستقبلية والمساهمة في التنمية المستدامة للمجتمع. نؤمن بأهمية الجودة والتميز في التعليم والبحث العلمي.',
                'image' => 'default_unit_institute.jpg', // Placeholder image
                'status' => true,
            ],
            [
                'vision' => 'أن نكون مركزاً متميزاً للبحث العلمي والابتكار في مجال الهندسة، نسعى لتحقيق التميز الأكاديمي والبحثي من خلال تطوير برامج تعليمية متقدمة وإجراء بحوث علمية تطبيقية تساهم في حل المشاكل الصناعية والمجتمعية.',
                'message' => 'نلتزم بتقديم تعليم عالي الجودة يدمج بين النظرية والتطبيق العملي، ونسعى لتطوير مهارات الطلاب الإبداعية والتحليلية. نؤمن بأهمية الشراكة مع القطاع الصناعي والمؤسسات البحثية لتحقيق أهدافنا التعليمية والبحثية.',
                'image' => 'default_unit_institute_2.jpg', // Placeholder image
                'status' => true,
            ],
            [
                'vision' => 'أن نكون بيت خبرة في مجال الهندسة والتكنولوجيا، نسعى لتحقيق الريادة في التعليم الهندسي والبحث العلمي من خلال برامج تعليمية متطورة وبيئة تعليمية محفزة للإبداع والابتكار.',
                'message' => 'نهدف لتخريج مهندسين مؤهلين علمياً وعملياً، قادرين على المساهمة الفعالة في التنمية الصناعية والتكنولوجية. نؤمن بأهمية التعلم المستمر والتطوير المهني المستمر لضمان مواكبة التطورات التكنولوجية السريعة.',
                'image' => 'default_unit_institute_3.jpg', // Placeholder image
                'status' => true, // This one will be inactive for demonstration
            ],
        ];

        foreach ($unitInstitutes as $unitInstitute) {
            UnitInstitutes::create($unitInstitute);
        }
    }
}
