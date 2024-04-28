<?php

namespace App\Providers;

//use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // DB::connection()
        // ->getDoctrineSchemaManager()
        // ->getDatabasePlatform()
        // ->registerDoctrineTypeMapping('enum', 'string');
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['hu','en']);
        });
    }
}
