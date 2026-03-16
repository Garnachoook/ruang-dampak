<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Helpers\DummyData;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mentor.dashboard', [
            'mentor_name' => auth()->user()->name ?? 'Budi Santoso', // Mengambil nama asli jika ada
            'batches' => [
                [
                    'name' => 'UI/UX Design — Batch 5',
                    'program' => 'UI/UX Design Bootcamp',
                    'peserta' => 12,
                    'quota' => 24,
                    'status' => 'ongoing'
                ],
            ],
            'nextSession' => DummyData::liveSessions()[0],
            'pendingReviews' => DummyData::assignments(),
            'stats' => [
                'batch_aktif' => 1,
                'total_peserta' => 12,
                'pending_review' => 2,
                'rating' => 4.8,
            ],
        ]);
    }
}