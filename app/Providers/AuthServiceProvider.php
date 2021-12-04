<?php

namespace App\Providers;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

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

        Gate::define('edit-users', function ($user){
            return $user->hasAnyRoles(['Directeur', 'Secretariat']);
        });
        Gate::define('manage-users', function ($user){
            return $user->hasAnyRoles(['Directeur', 'Secretariat']);
        });

        Gate::define('gestion-administration', function ($user){

            return $user->hasAnyRoles(['Directeur']);
        });
        Gate::define('gestion-finance', function ($user){
            return $user->hasAnyRoles(['Finance','Directeur']);
        });
        Gate::define('gestion-secretariat', function ($user){
            return $user->hasAnyRoles(['Secretariat','Directeur']);
        });
        Gate::define('gestion-admingeneral', function ($user){
            return $user->hasAnyRoles(['Secretariat', 'Directeur']);
        });

        Gate::define('delete-users', function ($user){
            return $user->hasRole('Directeur');
        });


        //
    }
}
