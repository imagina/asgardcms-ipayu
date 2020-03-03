<?php

namespace Modules\Ipayu\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Ipayu\Support\RecurringPayments\SupportPayUPlans;

class PlanServiceProvider extends ServiceProvider
{
  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->singleton('plan',function(){
      return new SupportPayUPlans();
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return [];
  }
}
