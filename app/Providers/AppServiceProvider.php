<?php

namespace App\Providers;

use App\Http\ViewComposers\CollectionComposer;
use Illuminate\Support\ServiceProvider;

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
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        view()->composer([
        'front.partials.footer',
        'front.partials.headers.header',
        'front.shop-left-sidebar',
        'front.contact',
        'backoffice.collections.list',
        'backoffice.categories.form',
        'backoffice.products.form',
        ]
        , CollectionComposer::class);
    }
}
