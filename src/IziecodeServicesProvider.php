<?php

namespace Iziedev\Iziecode;

use Illuminate\Support\ServiceProvider;
use Iziedev\Iziecode\App\View\Component\Icon;
use File;

class IziecodeServicesProvider extends ServiceProvider
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
     * @return void
     */
    public function boot()
    {
        if (File::exists(__DIR__ . '/helpers.php')) {
            require __DIR__ . '/helpers.php';
        }

        $this->loadViewsFrom(__DIR__.'/Resources/views','iziecode');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewComponentsAs('ez', [
            Icon::class
        ]);

        $this->publishes([
            __DIR__.'/Config/iziecode.php' => config_path('iziecode.php'),
        ],'config');

        $this->publishes([
            __DIR__.'/Public/iziecode' => public_path('iziecode'),
        ],'public');

        // $this->publishes([
        //     __DIR__.'../../../almasaeed2010/adminlte/plugins' => public_path('iziecode'),
        //     __DIR__.'../../../almasaeed2010/adminlte/dist' => public_path('iziecode'),
        // ],'public');

    }
}
