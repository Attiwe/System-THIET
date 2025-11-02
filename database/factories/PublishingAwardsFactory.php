<?php

namespace Database\Factories;

use App\Models\PublishingAwards;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PublishingAwards>
 */
class PublishingAwardsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PublishingAwards::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic doctor names
        $doctorNames = [
            'د. أحمد محمد علي',
            'د. فاطمة حسن إبراهيم',
            'د. محمود عبدالله سالم',
            'د. سارة خالد محمد',
            'د. عمر يوسف أحمد',
            'د. نورا حسن فؤاد',
            'د. يوسف علي محمود',
            'د. مريم سعيد عبدالرحمن',
            'د. خالد أمين حسن',
            'د. هدى محمد صالح',
            'د. علي عبدالله كامل',
            'د. لينا أحمد طه',
            'د. محمد فوزي ناصر',
            'د. إيمان محمود سعد',
            'د. حسن علي عبدالغني',
        ];

        // Arabic award names
        $awardNames = [
            'جائزة أفضل بحث علمي',
            'جائزة التميز في النشر العلمي',
            'جائزة الإبداع الأكاديمي',
            'جائزة أفضل مؤلف علمي',
            'جائزة التميز البحثي',
            'جائزة الإنجاز العلمي المتميز',
            'جائزة أفضل دراسة بحثية',
            'جائزة التميز في التأليف العلمي',
            'جائزة الإبداع البحثي',
            'جائزة أفضل عمل علمي منشور',
            'جائزة التميز الأكاديمي',
            'جائزة الإسهام العلمي المتميز',
            'جائزة أفضل مؤلف في العلوم',
            'جائزة التميز في البحوث',
            'جائزة الإبداع في النشر الأكاديمي',
        ];

        return [
            'doctor_name' => $this->faker->randomElement($doctorNames),
            'award_name' => $this->faker->randomElement($awardNames),
            'award_date' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'project_file' => $this->faker->optional(0.7)->randomElement([
                'project_1.pdf',
                'project_2.pdf',
                'project_3.pdf',
                'research_paper.pdf',
                'award_document.pdf',
            ]), // 70% chance of having a file
        ];
    }
}


