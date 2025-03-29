<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::defaultView('pagination::default');

        // Редактирование книг
        Gate::define('edit-books', function (User $user) {
            return $user->isAdmin();
        });

        // Удаление книг
        Gate::define('delete-books', function (User $user) {
            return $user->isAdmin();
        });
    }
}
