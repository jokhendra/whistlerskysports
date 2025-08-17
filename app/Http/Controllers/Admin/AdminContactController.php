<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    /**
     * Display a listing of contacts.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        // Apply search filter if provided
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Apply date filters if provided
        if ($fromDate = $request->input('from_date')) {
            $query->whereDate('created_at', '>=', $fromDate);
        }
        if ($toDate = $request->input('to_date')) {
            $query->whereDate('created_at', '<=', $toDate);
        }

        // Apply status filter if provided
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $contacts = $query->latest()->paginate(10)->withQueryString();

        // Get statistics
        $stats = [
            'total' => Contact::count(),
            'unread' => Contact::where('status', 'unread')->count(),
            'today' => Contact::whereDate('created_at', now()->setTimezone(config('app.timezone'))->toDateString())->count(),
        ];

        return view('admin.contacts.index', compact('contacts', 'stats'));
    }

    /**
     * Show the specified contact.
     *
     * @param Contact $contact
     * @return \Illuminate\View\View
     */
    public function show(Contact $contact)
    {
        // Mark as read if unread
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Update the contact status.
     *
     * @param Request $request
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:pending,unread,read,in_progress,responded,closed,archived'
        ]);

        $contact->update(['status' => $request->status]);

        return back()->with('success', 'Contact status updated successfully');
    }

    /**
     * Export contacts to CSV.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(Request $request)
    {
        $query = Contact::query();

        // Apply filters
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        if ($fromDate = $request->input('from_date')) {
            $query->whereDate('created_at', '>=', $fromDate);
        }
        if ($toDate = $request->input('to_date')) {
            $query->whereDate('created_at', '<=', $toDate);
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $fileName = 'contacts-' . now()->format('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $columns = [
            'ID',
            'Name',
            'Email',
            'Phone',
            'Subject',
            'Message',
            'Status',
            'Created At'
        ];

        $callback = function() use ($query, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($query->latest()->get() as $contact) {
                fputcsv($file, [
                    $contact->id,
                    $contact->name,
                    $contact->email,
                    $contact->phone,
                    $contact->subject,
                    $contact->message,
                    $contact->status,
                    $contact->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Delete the specified contact.
     *
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Contact deleted successfully');
    }
} 