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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
           return $user->role_id == '1';
        });
        /* define a Sales Manager user role */
        Gate::define('isSalesManager', function($user) {
           return $user->role_id == '2';
        });
        /* define a Operator user role */
        Gate::define('isOperator', function($user) {
           return $user->role_id == '3';
        });
    }
}