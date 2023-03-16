<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use JulioMotol\AuthTimeout\Middleware\AuthTimeoutMiddleware;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    AuthTimeoutMiddleware::setRedirectTo(function ($request, $guard){
      switch($guard){
          case 'web.admin':
              return route('auth.admin.login');
          default:
              return route('home');
      }
    });
    Paginator::useBootstrapFive();
  }
}
