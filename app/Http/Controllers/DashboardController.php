<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('admin.dashboard');
        }

        if (Auth::user()->role == 'hrd') {
            return view('hrd.dashboard');
        }

        if (Auth::user()->role == 'pimpinan') {
            return view('pimpinan.dashboard');
        }
    }
}