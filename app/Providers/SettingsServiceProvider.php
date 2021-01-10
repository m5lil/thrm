<?php

namespace App\Providers;

use App\Modules\Core\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @param Cache $cache
     * @param Setting $settings
     * @return void
     */
    public function boot(Cache $cache, Setting $settings)
    {
        $settings = $cache->remember('settings', 60, function($settings)
        {
            return $settings->pluck('value', 'name')->all();
        });

        config()->set('setting', $settings);
    }
}
