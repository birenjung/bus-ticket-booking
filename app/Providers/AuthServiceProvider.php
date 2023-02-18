<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Buses;
use App\Models\Routes;
use App\Policies\BusesPolicy;
use App\Policies\RoutesPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Auth\Access\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Routes::class => RoutesPolicy::class,
        Buses::class => BusesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
       
    }


}
