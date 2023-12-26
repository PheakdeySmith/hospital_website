<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $data['testimonials'] = Testimonial::all();
        return view('dashboard.admin.testimonials.index', $data);
    }

    public function create()
    {
        return view('dashboard.admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'in:active,inactive',
        ]);

        // Convert 'active' to 1, and 'inactive' to 0
        $request->merge(['status' => $request->input('status') === 'active' ? 1 : 0]);

        Testimonial::create($request->all());

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'in:active,inactive',
        ]);

        // Convert 'active' to 1, and 'inactive' to 0
        $request->merge(['status' => $request->input('status') === 'active' ? 1 : 0]);

        $testimonial->update($request->all());

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully');
    }
}
