<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contest;

class ContestController extends Controller
{
    public function index()
    {
        // Fetch all contests
        $contests = Contest::all();

        return view('admin.contest', compact('contests'));
    }

    // Store a new contest
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'description' => 'required|string',
            'start_date' => 'required|date',
            'deadline' => 'required|date|after:start_date',
        ]);

        // Create a new contest
        Contest::create([
            'title' => now()->year . ' Contest', // Auto-generate the title using the current year
            'description' => $request->description,
            'start_date' => $request->start_date,
            'deadline' => $request->deadline,
        ]);

        // Redirect back to the contest page with success message
        return redirect()->route('admin.contest.index')->with('success', 'Contest created successfully!');
    }
}
