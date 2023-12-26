<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ManagerTreatmentController extends Controller
{
    public function index()
    {
        $data['treatments'] = Treatment::all();
        return view('dashboard.manager.treatments.index', $data);
    }

    public function create()
    {
        return view('dashboard.manager.treatments.create');
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
                'status' => $request->status == 'active' ? 1 : 0, // Convert string to numeric
            ];

            // Handle image upload if provided
            if ($request->hasFile('image')) {
                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                $path = $request->image->storeAs('treatments_images', $imageName, 'public');
                $allData['image'] = $path;
            }

            Treatment::create($allData);

            return redirect()->route('manager.treatments.index')->with('success', 'Treatment created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function edit(Treatment $treatment)
    {
        return view('dashboard.manager.treatments.edit', compact('treatment'));
    }

    public function update(Request $request, Treatment $treatment)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:1,0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $treatment->fill($validatedData);

        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            \Storage::disk('public')->delete($treatment->image);

            // Store the new image
            $imagePath = $request->file('image')->storeAs('treatments_images', Str::random().'.'.$request->image->getClientOriginalExtension(), 'public');
            $treatment->image = $imagePath;
        }

        $treatment->save();

        return redirect()->route('manager.treatments.index')->with('success', 'Treatment updated successfully.');
    }


    public function destroy(Treatment $treatment)
    {
        try {
            // Delete the associated image
            \Storage::disk('public')->delete($treatment->image);

            $treatment->delete();

            return redirect()->route('manager.treatments.index')->with('success', 'Treatment deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
