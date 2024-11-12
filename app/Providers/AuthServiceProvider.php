<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('test', function (User $user) { //define('Gate'の名前, 定義する値)
            if($user->id === 1) { //defineで定義したユーザーテーブルのidが'1'ならtrueを返す
                return true;
            }
            return false;
        });
    }
}
