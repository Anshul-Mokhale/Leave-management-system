<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!Auth::check()) {
            return route('login');  // Redirect to login if not authenticated
        }

        // Redirect based on user role
        if (Auth::user()->is_admin) {
            return route('admin.dashboard');  // Redirect to the admin dashboard if admin
        }

        return route('dashboard');  // Redirect to the user dashboard if user
    }
}
