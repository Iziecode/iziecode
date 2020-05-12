<?php

namespace Iziedev\Iziecode;

use Illuminate\Support\ServiceProvider;
use Iziedev\Iziecode\App\View\Component\Icon;
use Illuminate\Support\Facades\File;
use Iziedev\Iziecode\Console\IzieCodeInstallCommand;

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

        $this->loadViewsFrom(__DIR__ . '/Resources/views', 'iziecode');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadViewComponentsAs('ez', [
            Icon::class
        ]);

        $this->publishes([
            __DIR__.'/Public/iziecode' => public_path('iziecode'),
        ],'iziecode-public');

        $this->publishes([
            __DIR__ . '/Config/iziecode.php' => config_path('iziecode.php'),
        ],'iziecode-config');

        $this->loadCommands();
    }

    public function loadCommands()
    {
        $this->commands(IzieCodeInstallCommand::class);
    }
}
