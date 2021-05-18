<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BusinessServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        #repository-injection-part
$this->app->singleton(\App\Cruder\Service\Abstract\IItemService::class, \App\Cruder\Service\Concrete\ItemService::class);
    }
}
