<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Kategori;
use Illuminate\Support\Facades\View;

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
        // Share all categories to the layout so navbar can render them
        try {
            $categories = Kategori::orderBy('nama')->get();
            View::share('allKategori', $categories);
        } catch (\Throwable $e) {
            // In case of migration/state where model/table not available, fail silently
        }
    }
}
