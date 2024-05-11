<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [
    'name' => env('APP_NAME', 'Laravel'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'asset_url' => env('ASSET_URL'),
    'timezone' => 'UTC',
    'locale' => 'fr',
    'fallback_locale' => 'fr',
    'faker_locale' => 'en_US',
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    'maintenance' => [
        'driver' => 'file',  // or 'store'  => 'redis', if you are using Redis
    ],
    'providers' => ServiceProvider::defaultProviders()->merge([
        // Package Service Providers...
        Barryvdh\DomPDF\ServiceProvider::class,  // Ajout du ServiceProvider de dompdf

        // Application Service Providers...
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\FortifyServiceProvider::class,
        App\Providers\JetstreamServiceProvider::class,
    ])->toArray(),
    'aliases' => Facade::defaultAliases()->merge([
        App\Facades\Example::class,
        'PDF' => Barryvdh\DomPDF\Facade::class,  // Ajout de l'alias pour dompdf
    ])->toArray(),
];
