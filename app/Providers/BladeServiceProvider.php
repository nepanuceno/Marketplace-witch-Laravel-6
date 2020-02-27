<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
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
        // Add @var for Variable Assignment
        // Example: @DELETE('foo', 'bar')
        Blade::directive('delete_field', function ($expression) {
           return '<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-toggle="tooltip" onclick="$(this).find(\'form\').submit();" >';
        });
    }
}
