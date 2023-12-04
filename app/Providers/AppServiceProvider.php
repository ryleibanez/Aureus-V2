<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        //Address
        Validator::extend('unique_address', function ($attribute, $value, $parameters, $validator) {
            list($table, $column, $ignoreId) = $parameters;
            return DB::table('address')
                ->where($column, $value)
                ->where('id', '!=', $ignoreId)
                ->count() === 0;
        });
    }
}
