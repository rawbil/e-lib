<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;
use App\Models\Category; // Potentially useful for counts

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']); // Only authenticated users can access
    }

    public function index()
    {
        $user = Auth::user();

        // For now, we'll use a simple check or just show a generic dashboard.
        // When roles are reintroduced, this logic will be updated.

        // Example: If we want to show different views based on a simple email check for now
        if ($user->email === 'superadmin@example.com') {
            // Static data for Super Admin Dashboard
            $totalUsers = User::count();
            $totalLibrarians = User::where('email', 'like', '%librarian%')->count(); // Placeholder for now
            $totalStudents = User::where('email', 'like', '%student%')->count(); // Placeholder for now

            return view('dashboard.superadmin', compact('totalUsers', 'totalLibrarians', 'totalStudents'));
        } elseif ($user->email === 'librarian@example.com') {
            // Static data for Librarian Dashboard
            $totalBooks = Book::count();
            $availableBooks = Book::sum('available_copies');
            $pendingReservations = 0; // Placeholder
            $currentlyLoaned = 0; // Placeholder
            $overdueBooks = 0; // Placeholder
            $totalFines = 0.00; // Placeholder

            return view('dashboard.librarian', compact(
                'totalBooks', 'availableBooks', 'pendingReservations',
                'currentlyLoaned', 'overdueBooks', 'totalFines'
            ));
        } else { // Assume student or general user
            // For now, redirect students to their 'My Books' page, which will be static
            return redirect()->route('my.books');
        }
    }
}
