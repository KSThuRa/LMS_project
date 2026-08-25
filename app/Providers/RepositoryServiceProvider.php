<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Batch\BatchRepositoryInterface;
use App\Repositories\Batch\BatchRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //

    }
    public function boot(): void
    {
        $this->app->singleton(BatchRepositoryInterface::class, BatchRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

}
