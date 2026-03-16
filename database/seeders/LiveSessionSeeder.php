<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LiveSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batches = \App\Models\Batch::all();

        foreach ($batches as $batch) {
            // Mulai dari hari Rabu depan agar jadwal konsisten
            $startDate = now()->next(\Carbon\Carbon::WEDNESDAY)->setTime(19, 0);

            for ($i = 1; $i <= 8; $i++) {
                $weekNumber = ceil($i / 2);

                \App\Models\LiveSession::create([
                    'batch_id' => $batch->id,
                    'title' => "Sesi $i: " . ($i % 2 == 1 ? "Pengenalan & Orientasi" : "Praktek Langsung Mentor"),
                    'description' => "Pembahasan mendalam materi minggu ke-$weekNumber.",
                    'week_number' => $weekNumber,
                    'session_number' => $i,
                    'scheduled_at' => $startDate->copy(),
                    'duration_min' => 90,
                    'status' => $startDate->isPast() ? 'done' : 'scheduled',
                    'meeting_url' => 'https://zoom.us/j/ruangdampak' . $i,
                ]);

                // Selang-seling antara Rabu -> Jumat (+2 hari) dan Jumat -> Rabu depan (+5 hari)
                if ($i % 2 == 1) {
                    $startDate->addDays(2); // Ke Jumat
                } else {
                    $startDate->addDays(5); // Ke Rabu depan
                }
            }
        }
    }
}
