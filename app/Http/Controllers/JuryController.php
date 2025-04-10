<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Jury;

class JuryController extends Controller
{

    public function index()
    {
        $juries = Jury::all();
        return view('admin.jury_list', compact('juries'));
    }

   
    

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:juries',
            'phone' => 'required',
            'specialization' => 'required|in:Professional Wedding Photographer',
            'password' => 'required|confirmed|min:6',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profilePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePath = $request->file('profile_picture')->store('uploads/juries', 'public');
        }

        Jury::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'specialization' => $request->specialization,
            'password' => Hash::make($request->password),
            'profile_picture' => $profilePath,
        ]);

        return redirect()->route('admin.jury_list')->with('success', 'Jury added successfully!');
    }

    public function edit($id)
{
    $jury = \App\Models\Jury::findOrFail($id);
    return view('admin.edit_jury', compact('jury'));
}

public function update(Request $request, $id)
{
    $jury = \App\Models\Jury::findOrFail($id);

    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'specialization' => 'required',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('profile_picture')) {
        $path = $request->file('profile_picture')->store('uploads/juries', 'public');
        $jury->profile_picture = $path;
    }

    $jury->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone' => $request->phone,
        'specialization' => $request->specialization,
    ]);

    return redirect()->route('admin.jury_list')->with('success', 'Jury updated successfully!');
}

    public function destroy($id)
    {
        $jury = \App\Models\Jury::findOrFail($id);
        $jury->delete();

        return redirect()->route('admin.jury_list')->with('success', 'Jury deleted successfully!');
    }

}
