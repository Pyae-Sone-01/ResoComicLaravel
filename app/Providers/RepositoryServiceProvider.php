<?php

namespace App\Providers;

use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Repositories\BlogRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PermissionRepository;
use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Interfaces\Repositories\FaqCategoryRepositoryInterface;
use App\Interfaces\Repositories\FaqRepositoryInterface;
use App\Interfaces\Repositories\MediaRepositoryInterface;
use App\Interfaces\Repositories\PageRepositoryInterface;
use App\Interfaces\Repositories\RoleRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Repositories\PermissionRepositoryInterface;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\FaqCategoryRepository;
use App\Repositories\FaqRepository;
use App\Repositories\MediaRepository;
use App\Repositories\PageRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(BlogCategoryRepositoryInterface::class, BlogCategoryRepository::class);
        $this->app->bind(FaqCategoryRepositoryInterface::class, FaqCategoryRepository::class);
        $this->app->bind(FaqRepositoryInterface::class, FaqRepository::class);
        $this->app->bind(MediaRepositoryInterface::class, MediaRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
