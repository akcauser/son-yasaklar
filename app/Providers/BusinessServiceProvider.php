<?php

namespace App\Providers;

use App\Cruder\Service\Abstract\IItemService;
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
        $this->app->singleton(IItemService::class, \App\Cruder\Service\Concrete\ItemService::class);
    }
}
