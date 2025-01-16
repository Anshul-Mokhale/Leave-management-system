<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class UserLeaveController extends Controller
{
    public function Leaves()
    {
        return view('leaves');
    }

    public function submitLeave(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'leaveType' => 'required|string|in:Medical,Casual',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            // Handle file upload
            $attachmentPath = null;
            if ($request->hasFile('attachment')) {
                $attachmentPath = $request->file('attachment')->store('attachments', 'public');
            }

            // Save the leave request to the database
            Leave::create([
                'leave_type' => $validated['leaveType'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'attachment' => $attachmentPath,
                'sended_by' => auth()->id(),
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Leave request submitted successfully.');

        } catch (\Exception $e) {
            // Handle error and redirect back with error message
            return redirect()->back()->with('error', 'Failed to submit leave request: ' . $e->getMessage());
        }
    }
    public function getLeavesData(Request $request)
    {
        try {
            // Optional: Pagination logic (if needed)
            $perPage = $request->get('per_page', 10); // Number of items per page, default 10
            $search = $request->get('search', ''); // Search term from the frontend

            // Get the authenticated user's ID
            $userId = auth()->id(); // This assumes the user is authenticated

            // Query to fetch user-specific leaves
            $query = Leave::select([
                'id',
                'leave_type',
                'subject',
                'message',
                'attachment',
                'sended_by',
                'status',
                'created_at',
                'updated_at',
            ])
                ->where('sended_by', $userId) // Filter by the current user's ID
                ->when($search, function ($query) use ($search) {
                    return $query->where('leave_type', 'like', "%$search%")
                        ->orWhere('subject', 'like', "%$search%")
                        ->orWhere('message', 'like', "%$search%");
                })
                ->paginate($perPage); // Paginate the results

            // Return the data as JSON
            return response()->json([
                'data' => $query->items(),
                'total' => $query->total(),
                'per_page' => $query->perPage(),
                'current_page' => $query->currentPage(),
                'last_page' => $query->lastPage()
            ]);
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            \Log::error('Error fetching leaves data: ' . $e->getMessage());

            // Return a more descriptive error response
            return response()->json(['error' => 'An error occurred while fetching data. Please check the logs for more details.'], 500);
        }
    }
    public function show($id)
    {
        // Fetch the specific leave by ID
        $leave = Leave::findOrFail($id);

        // Pass the data to the view
        return view('viewleave', compact('leave'));
    }

    public function destroy($id)
    {
        // Find the leave record by ID
        $leave = Leave::findOrFail($id);

        // Delete the record
        $leave->delete();

        // Redirect or respond with success message
        return redirect()->route('user.leave')->with('success', 'Leave deleted successfully.');
    }

}
