<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Helpers\DummyData;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('peserta.dashboard', [
            'streak' => 7,
            'upcomingSessions' => DummyData::liveSessions(),
            'assignments' => DummyData::assignments(),
            'programs' => DummyData::programs(),
        ]);
    }
}