<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Admin;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $name = session()->get('name');
        $password = session()->get('password');

        if ($name && $password) {
            $admin = Admin::where([
                    ['name', $name],
                    ['password', $password],
                ])->first();

            if ($admin) {
                return $next($request);
            }
        }

        return redirect()->route('login_admin_page');        
    }
}
