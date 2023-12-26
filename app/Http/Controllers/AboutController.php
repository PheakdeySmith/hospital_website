<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index()
    {
        $data['abouts'] = About::all();
        return view('dashboard.abouts.index', $data);
    }

    public function create()
    {
        return view('dashboard.abouts.create');
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
                'status' => $request->status,
            ];

            // Handle image upload if provided
            if ($request->hasFile('image')) {
                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                $path = $request->image->storeAs('abouts_images', $imageName, 'public');
                $allData['image'] = $path;
            }

            About::create($allData);

            return redirect()->route('abouts.index')->with('success', 'About created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function edit(About $about)
    {
        return view('dashboard.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:active,inactive|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Update fields
            $about->title = $request->title;
            $about->description = $request->description;
            $about->status = $request->status;

            // Update image if provided
            if ($request->hasFile('image')) {
                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                $path = $request->image->storeAs('abouts_images', $imageName, 'public');

                // Delete the previous image if it exists
                \Storage::disk('public')->delete($about->image);

                $about->image = $path;
            }

            $about->save();

            return redirect()->route('abouts.index')->with('success', 'About updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy(About $about)
    {
        try {
            // Delete the associated image
            \Storage::disk('public')->delete($about->image);

            $about->delete();

            return redirect()->route('abouts.index')->with('success', 'About deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
