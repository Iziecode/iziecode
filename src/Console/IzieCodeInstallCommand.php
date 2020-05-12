<?php

namespace Iziedev\Iziecode\Console;

use Illuminate\Console\Command;
use Iziedev\Iziecode\Helpers\CommandHelper;

class IzieCodeInstallCommand extends Command
{
    protected $signature = 'iziecode:install';

    protected $description = 'Install iziecode assests';

    protected $assetsPackagePath = 'vendor/almasaeed2010/adminlte/';

    protected $directories = [
        'dist',
        'plugins'
    ];

    public function handle()
    {
        foreach ($this->directories as $dir) {
            CommandHelper::directoryCopy(base_path($this->assetsPackagePath . $dir), public_path('vendor/iziecode/' . $dir), true, true);
        }
    }
}
