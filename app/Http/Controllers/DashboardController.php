<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalAppointments = Appointment::count();

        $chartData = [
            'Users' => $totalUsers,
            'Appointments' => $totalAppointments,
        ];

        return view('dashboard.index', compact('totalUsers', 'totalAppointments', 'chartData'));
    }
}
