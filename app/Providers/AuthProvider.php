<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\RepositoryInterface\AuthInterface;
use App\Repositories\AuthRepository;


class AuthProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
    $this->app->bind(AuthInterface::class, AuthRepository::class);
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
