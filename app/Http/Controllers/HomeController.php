<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('dashboard.index');
    }

    public function home(){
        return view('dashboard.index');
    }

    public function adminHome(){
        return view('dashboard.admin.admin_dashboard');
    }

    public function managerHome(){
        return view('dashboard.manager.manager_dashboard');
    }
}
