<?php

namespace App\Providers;

use App\Models\Unit;
use Illuminate\Support\ServiceProvider;

class UnitProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $unit = Unit::first();

        view()->share([
            'unitVision' => optional($unit)->vision,
            'unitMessage' => optional($unit)->message,
        ]);
    }
}
