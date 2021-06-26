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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update', function ($user, $post){ //leidziama daryti update jeigu userio id sutampa su posto userio id
            return $user->id === $post->user_id;
        });
        Gate::define('destroy', function ($user, $post){ //leidziama istrinti jeigu userio id sutampa su posto userio id
            return $user->id === $post->user_id;
        });
    }
}
