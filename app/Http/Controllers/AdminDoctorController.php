<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminDoctorController extends Controller
{
    public function index()
    {
        $data['doctors'] = Doctor::all();
        return view('dashboard.admin.doctors.index', $data);
    }

    public function create()
    {
        return view('dashboard.admin.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $allData = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'specialization' => $request->specialization,
                'contact_number' => $request->contact_number,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'status' => $request->status == 'active' ? 1 : 0,
            ];

            // Handle image upload if provided
            if ($request->hasFile('image')) {
                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                $path = $request->image->storeAs('doctor_images', $imageName, 'public');
                $allData['image'] = $path;
            }

            Doctor::create($allData);

            return redirect()->route('admin.doctors.index')->with('success', 'Doctor created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function edit(Doctor $doctor)
    {
        return view('dashboard.admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'status' => 'required|in:1,0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $doctor->fill($validatedData);

        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            \Storage::disk('public')->delete($doctor->image);

            // Store the new image
            $imagePath = $request->file('image')->storeAs('doctor_images', Str::random().'.'.$request->image->getClientOriginalExtension(), 'public');
            $doctor->image = $imagePath;
        }

        $doctor->save();

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor)
    {
        try {
            // Delete the associated image
            \Storage::disk('public')->delete($doctor->image);

            $doctor->delete();

            return redirect()->route('admin.doctors.index')->with('success', 'Doctor deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
