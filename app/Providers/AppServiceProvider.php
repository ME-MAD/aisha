<?php

namespace App\Providers;

use App\Models\Setting;
use App\Services\Setting\SettingService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(SettingService $settingService)
    {
        // Schema::defaultStringLength(191);

        View::composer([
            'layout.header',
            'site.master',
            'site.home.index'
        ],function($view)use($settingService){
            return $view->with('setting', $settingService->getSettingRedis());
        });
    }
}
