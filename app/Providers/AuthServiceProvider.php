<?php

namespace App\Providers;

use App\Modules\Acl\Models\Permission;
use App\Modules\Acl\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // load permissions from database
        foreach ($this->getAllPermissions() as $permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }
    }

    public function getAllPermissions()
    {
        return Permission::with('roles')->get();
    }
}
