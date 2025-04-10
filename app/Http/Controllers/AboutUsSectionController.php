<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUsSection; 
use Illuminate\Support\Facades\Storage;

class AboutUsSectionController extends Controller
{
    public function index()
    {
        $sections = AboutUsSection::orderBy('order')->get();
        return view('about_us', compact('sections'));
    }

    public function manage()
    {
        $sections = AboutUsSection::orderBy('order')->get();
        return view('admin.manage_about', compact('sections'));
    }

  

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'order' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $section = new AboutUsSection($request->only('title', 'content', 'order'));

        if ($request->hasFile('image')) {
            $section->image = $request->file('image')->store('uploads/about_sections', 'public');
        }

        $section->save();

        return back()->with('success', 'Section added successfully');
    }


    public function edit($id)
    {
        $section = AboutUsSection::findOrFail($id);
        return view('admin.about_edit', compact('section'));
    }
    public function update(Request $request, $id)
    {
        $section = AboutUsSection::findOrFail($id);
    
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $section->title = $request->title;
        $section->content = $request->content;
        $section->order = $request->order;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about-us', 'public');
            $section->image = $imagePath;
        }
    
        $section->save();
    
        return redirect()->route('about_us')->with('success', 'Section updated successfully.');
    }
    
}
