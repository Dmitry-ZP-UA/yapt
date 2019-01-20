<?php

namespace App\Providers;

use App\Repositories\CardRepository;
use App\Repositories\CommentRepository;
use App\Repositories\Interfaces\CardRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\StatusRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\StatusRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CardRepositoryInterface::class, CardRepository::class);

        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);

        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);

        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);

        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
    }
}
