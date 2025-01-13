<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Show the registration form (if necessary)
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Handle user registration
    public function register(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'age' => 'required|integer|min:18',
            'designation' => 'required|string|max:255',
            'job_id' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'gender' => 'required|in:male,female,other',
        ]);

        // If validation fails, return with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'designation' => $request->designation,
            'job_id' => $request->job_id,
            'password' => Hash::make($request->password), // Hash the password
            'gender' => $request->gender,
            'is_admin' => false, // Set the user as a regular user
        ]);

        // Optionally, log the user in or return a success response
        return redirect()->route('login')->with('success', 'Registration successful!');
    }
}
