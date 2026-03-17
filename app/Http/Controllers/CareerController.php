<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $jobs = JobListing::active()
            ->with([
                'mitra.mitraProfile', // eager load relasi mitra + profil
            ])
            ->when($request->filled('tipe'), fn($q) => $q->where('type', $request->tipe))
            ->when($request->mode === 'remote', fn($q) => $q->where('is_remote', true))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('title', 'like', "%{$request->search}%")
                        ->orWhereHas(
                            'mitra.mitraProfile',
                            fn($qMitra) =>
                            $qMitra->where('company_name', 'like', "%{$request->search}%")
                        );
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // supaya filter tetap ada saat pagination

        return view('career.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = JobListing::active()
            ->with([
                'mitra.mitraProfile',
            ])
            ->findOrFail($id);

        $related = JobListing::active()
            ->where('mitra_id', $job->mitra_id)
            ->whereKeyNot($job->id) // lebih idiomatik daripada where('id', '!=', ...)
            ->take(3)
            ->get();

        return view('career.show', compact('job', 'related'));
    }
}