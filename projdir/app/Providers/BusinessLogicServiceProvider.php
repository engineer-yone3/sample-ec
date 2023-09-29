<?php

namespace App\Providers;

use App\Services\Admin\AdminUserIndexService;
use App\Services\Admin\IAdminUserIndexService;
use Illuminate\Support\ServiceProvider;

class BusinessLogicServiceProvider extends ServiceProvider
{

    public array $singletons = [
        IAdminUserIndexService::class => AdminUserIndexService::class
    ];

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
        //
    }
}
