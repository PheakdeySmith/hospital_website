<?php

// app/Http/Controllers/FrontController.php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;
use App\Models\Testimonial;
use App\Models\Treatment;

class FrontController extends Controller
{
    public function index()
    {
        $data['testimonials'] = Testimonial::all();
        $data['appointments'] = Appointment::all();
        $data['doctors'] = Doctor::all();
        $data['departments'] = Department::all();
        $data['abouts'] = About::all();
        $data['treatments'] = Treatment::all();
        return view('front.index', $data);
    }

    public function about()
    {
        $data['abouts'] = About::all();
        return view('front.about', $data);
    }

    public function doctor()
    {
        $data['doctors'] = Doctor::all();
        return view('front.doctor', $data);
    }

    public function client()
    {
        $data['testimonials'] = Testimonial::all();
        return view('front.client', $data);
    }

    public function treatment()
    {
        $data['doctors'] = Doctor::all();
        $data['treatments'] = Treatment::all();
        return view('front.treatment', $data);
    }

    public function contact()
    {
        return view('front.contact');
    }
}

