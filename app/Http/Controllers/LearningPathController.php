<?php

namespace App\Http\Controllers;

use App\Models\LearningPath;
use Illuminate\Http\Request;

class LearningPathController extends Controller
{
    public function index()
    {
        $paths = LearningPath::where('is_published', true)
            ->with(['programs' => fn($q) => $q->published()->with('batches')])
            ->orderBy('order_index')
            ->get();

        return view('learning-path.index', compact('paths'));
    }

    public function show($slug)
    {
        $path = LearningPath::where('slug', $slug)
            ->where('is_published', true)
            ->with([
                'programs' => fn($q) => $q->published()
                    ->with([
                        'batches' => fn($q) => $q->orderBy('start_date'),
                        'batches.enrollments',
                    ])
                    ->orderBy('order_index'),
            ])
            ->firstOrFail();

        return view('learning-path.show', compact('path'));
    }
}
