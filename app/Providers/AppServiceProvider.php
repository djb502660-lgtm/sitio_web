<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $since = now()->subDay();

        $lowStockProducts = Product::with('category')
            ->where('stock', '<=', 5)
            ->orderBy('stock')
            ->limit(5)
            ->get();

        $newUsers = User::where('created_at', '>=', $since)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $newProducts = Product::with('category')
            ->where('created_at', '>=', $since)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $newCategories = Category::where('created_at', '>=', $since)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $notificationCount = $lowStockProducts->count()
            + $newUsers->count()
            + $newProducts->count()
            + $newCategories->count();

        View::share('notificationCount', $notificationCount);
        View::share('lowStockProducts', $lowStockProducts);
        View::share('newUsers', $newUsers);
        View::share('newProducts', $newProducts);
        View::share('newCategories', $newCategories);
    }
}
