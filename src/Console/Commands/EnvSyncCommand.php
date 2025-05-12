<?php

namespace Core\Siteconfig\Console\Commands;

use Core\Siteconfig\Models\Config;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class EnvSyncCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siteconig:env-sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        Artisan::call('migrate', [
            '--force' => true,
        ]);

        $env = $_ENV;
        foreach ($env as $key => $value) {
            Config::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'is_env' => true,
                ]
            );
        }
    }
}
