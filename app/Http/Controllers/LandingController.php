<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\User;
use App\Models\JobListing;
use App\Models\LearningPath;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $programs = Program::published()
            ->with([
                'batches' => fn($q) => $q->withCount('enrollments')
                    ->where('status', 'open')
                    ->orderByDesc('start_date'),
            ])
            ->latest()
            ->take(3)
            ->get();

        $mentors = User::where('role', 'mentor')
            ->with('mentorProfile')
            ->whereHas('mentorProfile', fn($q) => $q->where('status', 'active'))
            ->take(4)
            ->get();

        $jobs = JobListing::active()
            ->with('mitra.mitraProfile')
            ->latest()
            ->take(3)
            ->get();

        $learningPaths = LearningPath::where('is_published', true)
            ->orderBy('order_index')
            ->get();

        return view('welcome', compact('programs', 'mentors', 'jobs', 'learningPaths'));
    }
}