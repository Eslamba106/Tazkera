<?php

namespace App\Providers\admin;

use Illuminate\Support\ServiceProvider;
use App\Repositories\admin\AdminRepository;
use App\Repositories\admin\AdminRepositoryInterface;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminRepositoryInterface::class, function () {
            return new AdminRepository();
        });    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
