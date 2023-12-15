<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        Cashier::useCustomerModel(User::class);


        // TODO: (SUBHASH) With accessor and mutator column fatch
        Collection::macro('pick', function (...$columns) {
            return $this->map(function ($item, $key) use ($columns) {
                $data = [];
                foreach ($columns as $column) {
                    $data[$column] = $item[$column] ?? null;
                }
                return $data;
            });
        });
    }
}
