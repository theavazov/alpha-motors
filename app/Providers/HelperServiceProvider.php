<?php

namespace App\Providers;

use Faker\Extension\Helper;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->singleton('filter_formdata_by_key', function () {
      return new Helper();
    });
  }
}
