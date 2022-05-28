<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Book;
use App\Models\Review;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('create-book', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('update-book', function (User $user) {
            return $user->is_admin === 1;
        });
        
        Gate::define('delete-book', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('create-category', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('update-category', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('delete-category', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('update-user', function (User $user, User $authUser) {
            return $user->id === $authUser->id;
        });

        Gate::define('delete-user', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('update-review', function (User $user, Review $review) {
            return $user->id === $review->user_id;
        });
        
        Gate::define('delete-review', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('create-admin', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('update-admin', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('delete-admin', function (User $user) {
            return $user->is_admin === 1;
        });

    }
}
