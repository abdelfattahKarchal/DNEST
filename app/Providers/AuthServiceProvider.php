<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Collection' => 'App\Policies\CollectionPolicy',
        'App\Category' => 'App\Policies\CategoryPolicy',
        'App\SubCategory' => 'App\Policies\SubCategoryPolicy',
        'App\Product' => 'App\Policies\ProductPolicy',
        'App\Order' => 'App\Policies\OrderPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         Gate::define('admin.dashboard',function($user){
            return  in_array($user->role->label, ['admin','supadmin']);
         });

       /*  Gate::before(function ($user, $ability) {
            if ($user->role->label == 'admin') {
                return true;
            }
        }); */
    }
}
