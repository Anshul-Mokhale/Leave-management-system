<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle the authenticated logic after a successful login.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Check if user is admin
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');  // Redirect to admin dashboard
        }

        // If not admin, redirect to user dashboard
        return redirect()->route('user.dashboard');  // Redirect to user dashboard
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login'); // Returns the login form view
    }

    /**
     * Handle the login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the login form input
        $request->validate([
            'email' => 'required|email', // Ensures valid email format
            'password' => 'required|string|min:8', // Ensures password meets minimum length
        ]);

        // Attempt to log the user in
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], $request->filled('remember'))
        ) {
            // If login is successful, handle redirection based on role
            return $this->authenticated($request, Auth::user());
        }

        // If login fails, redirect back with an error message
        return back()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    /**
     * Logout the user and redirect to login page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('login'); // Redirect to login page
    }
}
