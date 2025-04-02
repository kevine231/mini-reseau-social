<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\DashboardPolicy; // Ajoute la policy ici

class AppServiceProvider extends ServiceProvider
{
    /**
     * Enregistrez les services d'application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap les services d'application.
     *
     * @return void
     */
    public function boot()
    {
        // Enregistrement de la policy associée à User
        Gate::policy(User::class, DashboardPolicy::class);
    }
}
