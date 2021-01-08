<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class PermissionsCheck
{

    /**
     * List of actions with their mapping name to handle.
     * See https://laravel.com/docs/8.x/authorization#authorizing-resource-controllers
     * @var array
     */
    protected $actions = [
        'index'     => 'view',
        'show'      => 'view',
        'edit'      => 'update',
        'update'    => 'update',
        'create'    => 'create',
        'store'     => 'create',
        'destroy'   => 'delete',
    ];


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guest()) {
            abort(403);
        }

        // get  the name of route like 'leaves.edit' and explde it to array ['leaves','edit']
        $routeName = explode('.', $request->route()->getName());

        // get action method of the route like 'store' and change with the suitable action name
        $action = $this->actions[$request->route()->getActionMethod()];

        // add
        $permission = $action . '-' . $routeName[0];


        $response = \Gate::inspect($permission);

        if ($response->allowed()) {
            return $next($request);
        } else {
            return redirect()->back()->with(['message' =>  __('No Permission')]);
        }


    }
}
