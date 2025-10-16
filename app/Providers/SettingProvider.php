<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

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
        try {
            // Check if database connection is available and table exists
            if ($this->app->bound('db') && \Schema::hasTable('settings')) {
                //setting 
                $getSetting = Setting::firstOr(function(){
                    return  Setting::create([
                        'name' => 'المعهد العالي للهندسة و التكنولوجيا بطنطا',
                        'email' => 'info@thiet.edu.eg',
                        'phone1' => '20403103727',
                        'phone2' => '20403103727',
                        'address' => 'طنطا -الغربية',
                        'logo' => '',
                     ]);
                });

                view()->share([
                    'getSetting' => $getSetting,
                ]);
            } else {
                // Provide default settings if database is not available
                $defaultSetting = (object) [
                    'name' => 'المعهد العالي للهندسة و التكنولوجيا بطنطا',
                    'email' => 'info@thiet.edu.eg',
                    'phone1' => '20403103727',
                    'phone2' => '20403103727',
                    'address' => 'طنطا -الغربية',
                    'logo' => '',
                ];
                
                view()->share([
                    'getSetting' => $defaultSetting,
                ]);
            }
        } catch (\Exception $e) {
            // Log the error and provide default settings
            \Log::warning('SettingProvider: Failed to load settings data', [
                'error' => $e->getMessage()
            ]);
            
            $defaultSetting = (object) [
                'name' => 'المعهد العالي للهندسة و التكنولوجيا بطنطا',
                'email' => 'info@thiet.edu.eg',
                'phone1' => '20403103727',
                'phone2' => '20403103727',
                'address' => 'طنطا -الغربية',
                'logo' => '',
            ];
            
            view()->share([
                'getSetting' => $defaultSetting,
            ]);
        }
    }
}
