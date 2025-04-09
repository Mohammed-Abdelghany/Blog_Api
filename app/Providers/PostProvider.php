<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\RepositoryInterface\PostInterface;

class PostProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
$this->app->bind(PostInterface::class,PostRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
