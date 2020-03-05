<?php

namespace Modules\Ipayu\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Ipayu\Events\Handlers\RegisterIpayuSidebar;

class IpayuServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
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
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIpayuSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('creditcards', array_dot(trans('ipayu::creditcards')));
            $event->load('orders', array_dot(trans('ipayu::orders')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('ipayu', 'permissions');
        $this->publishConfig('ipayu', 'settings');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Ipayu\Repositories\CreditCardRepository',
            function () {
                $repository = new \Modules\Ipayu\Repositories\Eloquent\EloquentCreditCardRepository(new \Modules\Ipayu\Entities\CreditCard());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ipayu\Repositories\Cache\CacheCreditCardDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Ipayu\Repositories\OrderRepository',
            function () {
                $repository = new \Modules\Ipayu\Repositories\Eloquent\EloquentOrderRepository(new \Modules\Ipayu\Entities\Order());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ipayu\Repositories\Cache\CacheOrderDecorator($repository);
            }
        );
// add bindings


    }
}
