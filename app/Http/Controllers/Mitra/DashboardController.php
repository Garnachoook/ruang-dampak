<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Kita tidak perlu memuat DummyData di sini karena halamannya sedang maintenance
        return view('mitra.dashboard', [
            'company_name' => auth()->user()->name ?? 'Mitra Perusahaan',
        ]);
    }
}