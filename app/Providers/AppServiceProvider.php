<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
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
        // if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
        //     DB::statement(DB::raw('PRAGMA foreign_keys=1'));
        // }
    }
}
