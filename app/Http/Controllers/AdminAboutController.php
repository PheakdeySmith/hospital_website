<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminAboutController extends Controller
{
    public function index()
    {
        $data['abouts'] = About::all();
        return view('dashboard.admin.abouts.index', $data);
    }

    public function create()
    {
        return view('dashboard.admin.abouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:active,inactive|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $allData = [
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status == 'active' ? 1 : 0,
            ];

            // Handle image upload if provided
            if ($request->hasFile('image')) {
                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                $path = $request->image->storeAs('abouts_images', $imageName, 'public');
                $allData['image'] = $path;
            }

            About::create($allData);

            return redirect()->route('admin.abouts.index')->with('success', 'About created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function edit(About $about)
    {
        return view('dashboard.admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:1,0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about->fill($validatedData);

        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            \Storage::disk('public')->delete($about->image);

            // Store the new image
            $imagePath = $request->file('image')->storeAs('abouts_images', Str::random().'.'.$request->image->getClientOriginalExtension(), 'public');
            $about->image = $imagePath;
        }

        $about->save();

        return redirect()->route('admin.abouts.index')->with('success', 'About updated successfully.');
    }


    public function destroy(About $about)
    {
        try {
            // Delete the associated image
            \Storage::disk('public')->delete($about->image);

            $about->delete();

            return redirect()->route('admin.abouts.index')->with('success', 'About deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
