<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class SettingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    public function boot(): void
    {
        //setting 
        $getSetting = Setting::firstOr(function(){
            return  Setting::create([
                'name' => 'المعهد العالي للهندسة و التكنولوجيا بطنطا',
                'email' => 'info@thiet.edu.eg',
                'phone1' => '20403103727',
                'phone2' => '20403103727',
                'address' => 'طنطا -الغربية',
                'logo' => 'include/logo/logo.webp',
            ]);
        });


        view()->share([
            'getSetting' => $getSetting,
        ]);        
     }
}
