<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use DB;

use App\Http\Controllers\Admin\Permission as Per;

use Symfony\Component\HttpFoundation\Response;

//
use App\Models\Permission;
use App\Models\User;

//
use Illuminate\Support\Facades\Auth;

//
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class CheckPermission
{
    /**
     * @var string
     * Example midleware roles admin.permission:allow,administrator,editor
     */
    protected $middlewarePrefix = 'permission:';

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$args): Response
    {
        if ((!empty($args) || $this->shouldPassThrough($request) || Auth::user() && Auth::user()->isAdministrator())) {
            return $next($request);
        }

        // Allow access route
        if ($this->routeDefaultPass($request)) {
            return $next($request);
        }

        // Allow notice
//        if (Str::startsWith($request->route()->getName(), 'admin_notice.')) {
//            return $next($request);
//        }

        //Check middware in route
        if ($this->checkRoutePermission($request)) {

            return $next($request);
        }

        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through verification.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        $routePath = $request->path();

        $exceptsPAth = [
              '/login',
              '/logout',
        ];
        return in_array($routePath, $exceptsPAth);
    }

    /**
     * Check route default allow access
     */

    public function routeDefaultPass($request)
    {
        $routeName = $request->route()->getName();
        $allowRoute = ['admin.deny', 'admin.deny_single', 'admin.locale', 'admin.home', 'admin.theme','admin.data_not_found'];
        return in_array($routeName, $allowRoute);
    }

    /**
     * If the route of current request contains a middleware prefixed with 'admin.permission:',
     * then it has a manually set permission middleware, we need to handle it first.
     *
     * @param Request $request
     *
     * @return bool
     */
    public function checkRoutePermission(Request $request)
    {
        if (!$middleware = collect($request->route()->middleware())->first(function ($middleware) {
            return Str::startsWith($middleware, $this->middlewarePrefix);
        })) {
            return false;
        }

        $routeName = $request->route()->getName();
        $user = Auth::user()->id;
        $role = User::find(5)->roles()->pluck('role_slug', 'id');



//        $args = explode(',', str_replace($this->middlewarePrefix, '', $middleware));
//
//        $method = array_shift($args);
//
//        if (!method_exists(Per::class, $method)) {
//            throw new \InvalidArgumentException("Invalid permission method [$method].");
//        }
//
//        call_user_func_array([Per::class, $method], [$args]);

        return true;
    }

}
