<?php

namespace App\Providers;

use App\Repositories\Admin\AdminUserIndexRepository;
use App\Repositories\Admin\IAdminUserIndexRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{

    public array $singletons = [
        IAdminUserIndexRepository::class => AdminUserIndexRepository::class
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
