<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::published()
            ->with([
                'batches' => fn($q) => $q->orderBy('start_date'),
                'batches.mentor',
                'batches.enrollments',
            ])
            ->withAvg('mentorReviews', 'rating')
            ->when(request('kategori'), fn($q, $k) => $q->where('category', $k))
            ->when(request('tipe'), fn($q, $t) => $q->where('type', $t))
            ->paginate(12)
            ->withQueryString();

        $categories = ['ui-ux-design', 'data-science', 'web-development', 'digital-marketing', 'finance'];

        return view('program.index', compact('programs', 'categories'));
    }

    public function show($slug)
    {
        $program = Program::published()
            ->where('slug', $slug)
            ->with([
                'modules' => fn($q) => $q->orderBy('week_number')->orderBy('order_index'),
                'batches' => fn($q) => $q->orderBy('start_date'),
                'batches.mentor.mentorProfile',
                'batches.enrollments',
                'batches.liveSessions' => fn($q) => $q->where('status', 'done')
                    ->latest('scheduled_at')
                    ->take(5),
            ])
            ->withAvg('mentorReviews', 'rating')
            ->firstOrFail();

        $activeBatch = $program->batches->where('status', 'open')->first()
            ?? $program->batches->first();

        return view('program.show', compact('program', 'activeBatch'));
    }
}