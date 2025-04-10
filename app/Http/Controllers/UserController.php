<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('admin.user', compact('users')); // Load users into the view
    }
    public function toggleStatus($id)
{
    $user = User::findOrFail($id);
    $user->status = !$user->status; // Toggle status
    $user->save();

    return redirect()->back()->with('success', 'User status updated successfully!');
}
}
