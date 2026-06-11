<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\HasilTopsis;

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

            $hasil = HasilTopsis::orderBy('rank', 'asc')->get();

            return view('pimpinan.dashboard', compact('hasil'));
        }
    }
}