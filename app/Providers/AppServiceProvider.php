<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $siteconfig = json_decode(\Storage::get('/frontend-config.json'));
      view()->share('siteconfig', $siteconfig);
      
      $default = public_path();
      app()->bind('path.public', function() use ($default) {
        return env('PUBLIC_PATH', $default);
      });
    }
}
