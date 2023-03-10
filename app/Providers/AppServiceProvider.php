<?php

namespace App\Providers;

use App\Http\Interfaces\AuthorRepositoryInterface;
use App\Http\Interfaces\BookRepositoryInterface;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
