<?php

namespace App\Providers;

use App\Repositories\Admin\AdminUserIndexRepository;
use App\Repositories\Admin\AdminUserUpdateRepository;
use App\Repositories\Admin\IAdminUserIndexRepository;
use App\Repositories\Admin\IAdminUserUpdateRepository;
use App\Repositories\Admin\IItemGenreIndexRepository;
use App\Repositories\Admin\IItemGenreUpdateRepository;
use App\Repositories\Admin\ItemGenreIndexRepository;
use App\Repositories\Admin\ItemGenreUpdateRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{

    public array $singletons = [
        IAdminUserIndexRepository::class => AdminUserIndexRepository::class,
        IAdminUserUpdateRepository::class => AdminUserUpdateRepository::class,
        IItemGenreIndexRepository::class => ItemGenreIndexRepository::class,
        IItemGenreUpdateRepository::class => ItemGenreUpdateRepository::class
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
