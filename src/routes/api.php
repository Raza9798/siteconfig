<?php

use Core\Siteconfig\Config;
use Illuminate\Support\Facades\Route;

if (!$this->app->runningInConsole()) {
    Route::group([
        'prefix' => 'config/api',
    ], function () {
        Route::get('list', [Config::class, 'list']);
        Route::post('save', [Config::class, 'store']);
        Route::get('show/{key}', [Config::class, 'show']);
        Route::post('update/{key}/{value}', [Config::class, 'update']);
        Route::delete('delete/{key}', [Config::class, 'delete']);
    });
}
