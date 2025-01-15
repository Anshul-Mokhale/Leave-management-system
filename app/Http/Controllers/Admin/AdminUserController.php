<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Display the user management page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.user'); // Load the view
    }

    /**
     * Fetch non-admin users as JSON for the table.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsersData(Request $request)
    {
        // Optional: Pagination logic (if needed)
        $perPage = $request->get('per_page', 10); // Number of items per page, default 10
        $search = $request->get('search', ''); // Search term from the frontend

        // Query to fetch users
        $query = User::select([
            'id',
            'name',
            'email',
            'phone',
            'age',
            'designation',
            'job_id',
            'gender',
            'created_at',
            'updated_at',
            'is_admin'
        ])
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%")
                    ->orWhere('designation', 'like', "%$search%");
            })
            ->paginate($perPage); // Paginate the results

        // Return the data as JSON in a structure that Tabulator or other front-end tools expect
        return response()->json([
            'data' => $query->items(),
            'total' => $query->total(),
            'per_page' => $query->perPage(),
            'current_page' => $query->currentPage(),
            'last_page' => $query->lastPage()
        ]);
    }
}
