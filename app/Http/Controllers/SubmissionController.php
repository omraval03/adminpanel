<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SubmissionController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('files')) {
            $uploadedFiles = [];
            foreach ($request->file('files') as $file) {
                $path = $file->store('uploads/gallery', 'public');
                $uploadedFiles[] = ['name' => $file->getClientOriginalName(), 'path' => $path];
            }
            return response()->json(['files' => $uploadedFiles]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
