<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'total_contacts' => Contact::count(),
            'total_users' => User::count(),
            'recent_bookings' => Booking::latest()->take(5)->get(),
            'recent_contacts' => Contact::latest()->take(5)->get(),
            'monthly_revenue' => Booking::whereMonth('created_at', now()->month)
                ->sum('total_price'),
            'yearly_revenue' => Booking::whereYear('created_at', now()->year)
                ->sum('total_price'),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function bookings()
    {
        $bookings = Booking::latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function contacts()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function promotionalEmails()
    {
        return view('admin.promotional-emails.index');
    }

    public function settings()
    {
        return view('admin.settings.index');
    }
} 