<?php

namespace App\Providers;

use App\Services\Admin\AdminUserIndexService;
use App\Services\Admin\AdminUserUpdateService;
use App\Services\Admin\IAdminUserIndexService;
use App\Services\Admin\IAdminUserUpdateService;
use Illuminate\Support\ServiceProvider;

class BusinessLogicServiceProvider extends ServiceProvider
{

    public array $singletons = [
        IAdminUserIndexService::class => AdminUserIndexService::class,
        IAdminUserUpdateService::class => AdminUserUpdateService::class,
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
