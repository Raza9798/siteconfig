<?php

namespace Core\Siteconfig;

use Core\Siteconfig\Console\Commands\EnvSyncCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class SiteconfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerAlias();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        if ($this->app->runningInConsole()) {
            $this->commands([
                EnvSyncCommand::class,
            ]);
        }
    }

     public function registerAlias(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Config', Config::class);
    }
}
