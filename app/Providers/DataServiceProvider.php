<?php

namespace App\Providers;

use App\Cruder\DataService\Abstract\IItemDataService;
use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        #repository-injection-part
        $this->app->singleton(IItemDataService::class, \App\Cruder\DataService\Concrete\ItemDataService::class);
    }
}
