<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    View::composer('*', function ($view) {
      $user = Auth::user();
      $view->with('user', $user ? [
        'name' => $user->name,
        'picture' => $user->picture ? "/storage/" . $user->picture : "/assets/imgs/profile_picture.svg",
      ] : null);
    });
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
