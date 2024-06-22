<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

use Symfony\Component\HttpFoundation\Response;

//
use Illuminate\Support\Facades\Auth;

//
use Illuminate\Support\Facades\Route;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role_id = Auth::user()->role_id;

        // Lay ra route name tu link URL
// Lấy thông tin về route hiện tại
        $currentRoute = Route::current();

        // Lấy tên của route hiện tại
        $routeName = Route::currentRouteName();

        dd($currentRoute);

        // role_id va route_name
        $routeNameNow = DB::table('routes')
            ->where('route_name', $routeName)
            ->first();

        $route_id = $routeNameNow->id;

        //
        $status = DB::table('permission')
            ->where([
                ['role_id', '=', $role_id],
                ['route_id', '=', $route_id]
            ])
            ->value('status');

        if ($status == 1) {
            // Nếu có quyền truy cập, tiếp tục xử lý request
            return $next($request);
        } else {
            // Nếu không có quyền truy cập, đẩy về trang đăng nhập
            $request->session()->flash('error', 'Bạn không có quyền truy cập trang này.');
            return redirect(\route('login'));
        }
    }
}
