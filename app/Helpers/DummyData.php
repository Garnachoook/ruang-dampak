<?php
namespace App\Helpers;

class DummyData
{
    public static function programs(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'UI/UX Design Bootcamp',
                'slug' => 'ui-ux-design-bootcamp',
                'type' => 'bootcamp',
                'category' => 'ui-ux-design',
                'price' => 1200000,
                'original_price' => 1500000,
                'thumbnail' => null,
                'rating' => 4.8,
                'review_count' => 48,
                'duration_months' => 3,
                'batch_number' => 5,
                'batch_status' => 'open',
                'enrolled' => 12,
                'quota' => 24,
                'mentor_name' => 'Budi Santoso',
                'mentor_initials' => 'BS',
            ],
            // ... (Masukkan sisa data programs dari prompt kamu di sini) ...
            [
                'id' => 2,
                'title' => 'Data Science Bootcamp',
                'slug' => 'data-science-bootcamp',
                'type' => 'bootcamp',
                'category' => 'data-science',
                'price' => 1500000,
                'original_price' => null,
                'thumbnail' => null,
                'rating' => 4.7,
                'review_count' => 32,
                'duration_months' => 4,
                'batch_number' => 5,
                'batch_status' => 'almost_full',
                'enrolled' => 18,
                'quota' => 20,
                'mentor_name' => 'Andi Saputra',
                'mentor_initials' => 'AS',
            ],
        ];
    }

    public static function liveSessions(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Sesi 7: Praktek Figma Auto Layout',
                'program' => 'UI/UX Design Bootcamp',
                'batch' => 'Batch 5',
                'week_number' => 4,
                'session_number' => 7,
                'scheduled_at' => '2026-03-18 19:00:00',
                'duration_min' => 90,
                'status' => 'scheduled',
                'meeting_url' => 'https://zoom.us/j/123456789',
                'recording_url' => null,
            ],
            [
                'id' => 2,
                'title' => 'Sesi 8: Review Proyek Akhir',
                'program' => 'UI/UX Design Bootcamp',
                'batch' => 'Batch 5',
                'week_number' => 4,
                'session_number' => 8,
                'scheduled_at' => '2026-03-20 19:00:00',
                'duration_min' => 90,
                'status' => 'scheduled',
                'meeting_url' => null,
                'recording_url' => null,
            ],
            [
                'id' => 3,
                'title' => 'Sesi 6: User Testing & Feedback',
                'program' => 'UI/UX Design Bootcamp',
                'batch' => 'Batch 5',
                'week_number' => 3,
                'session_number' => 6,
                'scheduled_at' => '2026-03-13 19:00:00',
                'duration_min' => 90,
                'status' => 'done',
                'meeting_url' => null,
                'recording_url' => 'https://drive.google.com/xxx',
            ],
        ];
    }

    public static function modules(): array
    {
        return [
            ['id' => 1, 'title' => 'Pengenalan UI/UX Design', 'week_number' => 1, 'has_video' => true, 'done' => true],
            ['id' => 2, 'title' => 'Design Thinking Process', 'week_number' => 1, 'has_video' => false, 'done' => true],
            ['id' => 3, 'title' => 'User Research Methods', 'week_number' => 2, 'has_video' => true, 'done' => true],
            ['id' => 4, 'title' => 'Membuat User Persona', 'week_number' => 2, 'has_video' => false, 'done' => false],
            ['id' => 5, 'title' => 'Wireframing Dasar', 'week_number' => 3, 'has_video' => true, 'done' => false],
            ['id' => 6, 'title' => 'Prototyping dengan Figma', 'week_number' => 3, 'has_video' => true, 'done' => false],
        ];
    }

    public static function assignments(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Buat User Persona dari Research',
                'program' => 'UI/UX Design Bootcamp',
                'deadline' => '2026-03-17 23:59:00',
                'max_score' => 100,
                'status' => 'pending',
                'score' => null,
                'feedback' => null,
            ],
            [
                'id' => 2,
                'title' => 'Wireframe Mobile App',
                'program' => 'UI/UX Design Bootcamp',
                'deadline' => '2026-03-24 23:59:00',
                'max_score' => 100,
                'status' => 'submitted',
                'score' => null,
                'feedback' => null,
            ],
            [
                'id' => 3,
                'title' => 'Design System Component Library',
                'program' => 'UI/UX Design Bootcamp',
                'deadline' => '2026-03-10 23:59:00',
                'max_score' => 100,
                'status' => 'reviewed',
                'score' => 88,
                'feedback' => 'Bagus! Konsistensi warna sudah baik.',
            ],
        ];
    }
}