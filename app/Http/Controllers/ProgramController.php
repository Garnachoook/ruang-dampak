<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Faker\Factory as Faker;


class ProgramController extends Controller
{
    // Fungsi pembantu untuk generate data dummy yang sama di semua page
    private function getDummyPrograms()
    {
        $faker = Faker::create('id_ID');
        $programData = [
            2 => [
                'title' => 'Fullstack Web dengan Laravel & Vite',
                'cat' => 'Development',
                'img' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=800'
            ],
            4 => [
                'title' => 'Mobile App dengan React Native',
                'cat' => 'Development',
                'img' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=800'
            ],
            5 => [
                'title' => 'Digital Marketing & Growth Hacking',
                'cat' => 'Marketing',
                'img' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800'
            ],
            6 => [
                'title' => 'Cyber Security Fundamental',
                'cat' => 'Security',
                'img' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800'
            ],
            7 => [
                'title' => 'Cloud Computing Essentials',
                'cat' => 'Cloud',
                'img' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=800'
            ],
            8 => [
                'title' => 'Artificial Intelligence & Machine Learning',
                'cat' => 'AI',
                'img' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=800'
            ],
            10 => [
                'title' => 'Product Management Workshop',
                'cat' => 'Management',
                'img' => 'https://images.unsplash.com/photo-1556740758-90de374c12ad?q=80&w=800'
            ],
        ];

        return collect($programData)->map(function ($item, $id) use ($faker) {
            // Generate Modules dummy untuk halaman Show
            $modules = collect(range(1, 4))->map(function ($week) use ($faker) {
                return (object) [
                    'week_number' => $week,
                    'title' => $faker->sentence(4),
                    'video_url' => $faker->boolean(70) ? 'https://youtube.com' : null
                ];
            });

            return (object) [
                'id' => $id,
                'title' => $item['title'],
                'category' => $item['cat'],
                'thumbnail_url' => $item['img'],
                'type' => $faker->randomElement(['Bootcamp']),
                'level' => $faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
                'description' => 'Pelajari ' . $item['title'] . ' dengan kurikulum berbasis industri. Program ini dirancang untuk membantumu menguasai skill yang relevan di tahun 2026.',
                'price' => $faker->randomElement(['Gratis', 'Rp 149.000', 'Rp 299.000']),
                'rating' => $faker->randomFloat(1, 4, 5),
                'total_students' => $faker->numberBetween(100, 1500),
                'modules' => $modules, // Data modul untuk accordion
            ];
        });
    }

    public function index()
    {
        $programs = $this->getDummyPrograms();
        return view('program.index, welcome', compact('programs'));
    }

    public function show($id)
    {
        $programs = $this->getDummyPrograms();
        // Cari program berdasarkan ID, jika tidak ada return 404
        $program = $programs->get($id) ?? abort(404);

        return view('program.show, welcome', compact('program'));
    }
}