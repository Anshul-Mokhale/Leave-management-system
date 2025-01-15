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
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Leave request submitted successfully.');

        } catch (\Exception $e) {
            // Handle error and redirect back with error message
            return redirect()->back()->with('error', 'Failed to submit leave request: ' . $e->getMessage());
        }
    }
}
