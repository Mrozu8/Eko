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
        $this->middleware('checkTechnician', ['except' => ['technician_dashboard', 'access_page']]);
        $this->middleware('checkWorker', ['except' => ['worker_dashboard', 'access_page']]);
        $this->middleware('checkAccountant', ['except' => ['accountant_dashboard', 'access_page']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function accountant_dashboard()
    {
        return view('accountant.dashboard');
    }

    public function worker_dashboard()
    {
        return view('worker.dashboard');
    }

    public function technician_dashboard()
    {
        return view('technician.dashboard');
    }

    public function access_page()
    {
        return view('404.access');
    }
}
