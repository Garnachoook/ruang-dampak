<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Batch;
use App\Models\Enrollment;
use App\Models\JobListing;
use App\Models\LearningPath;
use App\Models\MentorProfile;
use App\Models\MitraProfile;
use App\Models\Module;
use App\Models\Program;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin ──
        $admin = User::create([
            'name' => 'Admin Ruang Dampak',
            'email' => 'admin@ruangdampak.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // ── Mentors ──
        $mentors = collect();
        foreach (['Budi Santoso', 'Siti Rahma'] as $i => $name) {
            $mentor = User::create([
                'name' => $name,
                'email' => 'mentor' . ($i + 1) . '@ruangdampak.id',
                'password' => Hash::make('password'),
                'role' => 'mentor',
                'bio' => 'Experienced mentor in technology and education.',
            ]);
            MentorProfile::create([
                'user_id' => $mentor->id,
                'headline' => $i === 0 ? 'Full-Stack Developer at Tokopedia' : 'UI/UX Designer at Gojek',
                'skills' => $i === 0 ? ['Laravel', 'Vue.js', 'MySQL'] : ['Figma', 'Adobe XD', 'CSS'],
                'status' => 'active',
                'fee_per_session' => $i === 0 ? 150000 : 200000,
            ]);
            $mentors->push($mentor);
        }

        // ── Peserta ──
        $peserta = collect();
        foreach (['Andi Pratama', 'Dewi Lestari', 'Fajar Nugroho', 'Gita Savitri', 'Hendra Wijaya'] as $i => $name) {
            $peserta->push(User::create([
                'name' => $name,
                'email' => 'peserta' . ($i + 1) . '@ruangdampak.id',
                'password' => Hash::make('password'),
                'role' => 'peserta',
            ]));
        }

        // ── Mitra ──
        $mitra = User::create([
            'name' => 'PT Teknologi Maju',
            'email' => 'mitra@ruangdampak.id',
            'password' => Hash::make('password'),
            'role' => 'mitra',
        ]);
        MitraProfile::create([
            'user_id' => $mitra->id,
            'company_name' => 'PT Teknologi Maju',
            'industry' => 'Information Technology',
            'website_url' => 'https://teknologimaju.co.id',
            'status' => 'active',
        ]);

        // ── Learning Paths ──
        $paths = collect();
        foreach ([
            ['title' => 'Web Development', 'description' => 'Kuasai pengembangan web dari front-end hingga back-end.'],
            ['title' => 'UI/UX Design', 'description' => 'Pelajari prinsip desain dan tools industri.'],
        ] as $i => $data) {
            $paths->push(LearningPath::create(array_merge($data, [
                'is_published' => true,
                'order_index' => $i,
            ])));
        }

        // ── Programs ──
        $programData = [
            ['title' => 'Bootcamp Full-Stack Laravel', 'type' => 'bootcamp', 'path' => 0, 'price' => 1500000, 'thumb' => '/images/programs/fullstack-bootcamp.webp'],
            ['title' => 'Bootcamp Front-End React', 'type' => 'bootcamp', 'path' => 0, 'price' => 1200000, 'thumb' => '/images/programs/frontend-bootcamp.webp'],
            ['title' => 'Bootcamp UI/UX Fundamentals', 'type' => 'bootcamp', 'path' => 1, 'price' => 500000, 'thumb' => '/images/programs/uiux-bootcamp.webp'],
        ];

        $programs = collect();
        foreach ($programData as $pd) {
            $programs->push(Program::create([
                'title' => $pd['title'],
                'description' => 'Program intensif untuk meningkatkan skill di bidang teknologi.',
                'type' => $pd['type'],
                'price' => $pd['price'],
                'thumbnail_url' => $pd['thumb'],
                'is_published' => true,
                'created_by' => $admin->id,
                'learning_path_id' => $paths[$pd['path']]->id,
            ]));
        }

        // ── Batches (2 per program: Batch 4 done, Batch 5 open) ──
        $allBatches = collect();
        $enrollCounts = [
            0 => [12, 18],  // Full-Stack: 12/24 enrolled in batch 4 done, 18/24 in batch 5 open
            1 => [20, 8],   // Front-End: 20/20 done, 8/20 open
            2 => [15, 12],  // UI/UX: 15/24 done, 12/24 open
        ];
        foreach ($programs as $pi => $program) {
            for ($b = 4; $b <= 5; $b++) {
                $status = $b === 4 ? 'done' : 'open';
                $quota = $pi === 1 ? 20 : 24;
                $allBatches->push(Batch::create([
                    'program_id' => $program->id,
                    'name' => "Batch {$b} - {$program->title}",
                    'start_date' => $b === 4 ? now()->subWeeks(10) : now()->addWeeks(4),
                    'end_date' => $b === 4 ? now()->subWeeks(1) : now()->addWeeks(14),
                    'quota' => $quota,
                    'status' => $status,
                    'mentor_id' => $mentors->random()->id,
                ]));
            }
        }

        // ── Modules (3 per program) ──
        $allModules = collect();
        foreach ($programs as $program) {
            for ($m = 1; $m <= 3; $m++) {
                $allModules->push(Module::create([
                    'program_id' => $program->id,
                    'title' => "Module {$m}: " . fake()->sentence(3),
                    'content' => fake()->paragraphs(3, true),
                    'order_index' => $m,
                    'is_published' => true,
                ]));
            }
        }

        // ── Assignments (1 per batch) ──
        foreach ($allBatches as $batch) {
            Assignment::create([
                'batch_id' => $batch->id,
                'created_by' => $mentors->first()->id,
                'title' => 'Tugas Praktik: ' . fake()->sentence(4),
                'description' => fake()->paragraph(),
                'deadline' => now()->addWeeks(4),
                'max_score' => 100,
            ]);
        }

        // ── Enrollments (fake users enrolled in open Batch 5) ──
        $openBatches = $allBatches->filter(fn($b) => $b->status === 'open')->values();
        $targetEnrollments = [18, 8, 12]; // match the wireframe slot counts per program
        foreach ($openBatches as $i => $batch) {
            $count = $targetEnrollments[$i] ?? 10;
            for ($e = 0; $e < $count; $e++) {
                $fakeUser = User::create([
                    'name' => fake()->name(),
                    'email' => fake()->unique()->safeEmail(),
                    'password' => Hash::make('password'),
                    'role' => 'peserta',
                ]);
                Enrollment::create([
                    'user_id' => $fakeUser->id,
                    'batch_id' => $batch->id,
                    'payment_status' => 'paid',
                    'paid_at' => now()->subDays(rand(1, 14)),
                    'enrolled_at' => now()->subDays(rand(1, 14)),
                ]);
            }
        }

        // ── Quizzes (1 per module) ──
        foreach ($allModules as $module) {
            $quiz = Quiz::create([
                'module_id' => $module->id,
                'title' => 'Quiz: ' . $module->title,
                'passing_score' => 70,
            ]);

            // Add 3 sample questions per quiz
            for ($q = 1; $q <= 3; $q++) {
                QuizQuestion::create([
                    'quiz_id' => $quiz->id,
                    'question' => fake()->sentence() . '?',
                    'options' => ['Opsi A', 'Opsi B', 'Opsi C', 'Opsi D'],
                    'correct_index' => rand(0, 3),
                    'order_index' => $q,
                ]);
            }
        }

        // ── Job Listings (2 from mitra) ──
        JobListing::create([
            'mitra_id' => $mitra->id,
            'title' => 'Junior Full-Stack Developer',
            'description' => 'Bergabunglah dengan tim engineering kami untuk membangun produk inovatif.',
            'type' => 'fulltime',
            'location' => 'Jakarta',
            'is_remote' => true,
            'is_active' => true,
            'deadline' => now()->addMonths(2),
        ]);

        JobListing::create([
            'mitra_id' => $mitra->id,
            'title' => 'UI/UX Design Intern',
            'description' => 'Kesempatan magang untuk belajar desain produk di industri teknologi.',
            'type' => 'internship',
            'location' => 'Remote',
            'is_remote' => true,
            'is_active' => true,
            'deadline' => now()->addMonths(1),
        ]);
    }
}
