<?php

namespace App\Providers;

use App\Models\UnitInstitutes;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class UnitProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
    //     try {
    //         // Check if database connection is available and table exists
    //         if ($this->app->bound('db') && \Schema::hasTable('unit_institutes')) {
    //             $unitInstitutes = UnitInstitutes::first();

    //             view()->share([
    //                 'unitVision' => optional($unitInstitutes)->vision,
    //                 'unitMessage' => optional($unitInstitutes)->message,
    //             ]);
    //         } else {
    //             // Provide default values if database is not available
    //             view()->share([
    //                 'unitVision' => null,
    //                 'unitMessage' => null,
    //             ]);
    //         }
    //     } catch (\Exception $e) {
    //         // Log the error and provide default values
    //         \Log::warning('UnitProvider: Failed to load unit institutes data', [
    //             'error' => $e->getMessage()
    //         ]);
            
    //         view()->share([
    //             'unitVision' => null,
    //             'unitMessage' => null,
    //         ]);
    //     }
     }
}
