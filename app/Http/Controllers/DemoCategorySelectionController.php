<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemoCategorySelection;
use Illuminate\Support\Facades\Log;


class DemoCategorySelectionController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Received Data:', $request->all()); // Log received data

        foreach ($request->categories as $category) {
            DemoCategorySelection::create([
                'category_name' => $category['name'],
                'entries' => $category['entries'],
                'total_price' => $category['total_price'],
            ]);
        }

        return response()->json(['message' => 'Categories saved successfully!']);
    }

    public function fetch()
    {
        $categories = DemoCategorySelection::all();
       // dd($categories);
        return view('admin.payment', compact('categories'));   
    }
}
