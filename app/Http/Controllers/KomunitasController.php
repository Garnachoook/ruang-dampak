<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;

class KomunitasController extends Controller
{
    public function index()
    {
        $faker = Faker::create('id_ID');

        // Data Kategori Statis (karena desainnya spesifik)
        $categories = collect([
            ['name' => 'Diskusi Umum', 'color' => 'from-slate-500 to-slate-700'],
            ['name' => 'UI/UX Design', 'color' => 'from-rose-400 to-orange-400'],
            ['name' => 'Data Science', 'color' => 'from-emerald-500 to-teal-700'],
            ['name' => 'Web Dev', 'color' => 'from-blue-600 to-indigo-800'],
            ['name' => 'Finance', 'color' => 'from-amber-500 to-orange-600'],
        ]);

        // Judul dummy yang relevan dengan mahasiswa & perusahaan
        $topics = [
            'Bagaimana cara memikat HRD perusahaan mitra lewat portofolio UI/UX?',
            'Tips lolos seleksi real-world project dari perusahaan tech',
            'Tech stack backend apa yang paling sering dipakai startup tahun ini?',
            'Berapa lama idealnya mengerjakan mini project untuk tes magang?',
            'Cara transisi dari tugas kuliah biasa ke standar project industri',
        ];

        // Generate 10 Data Dummy Dinamis
        $discussions = collect(range(1, 5))->map(function ($i) use ($faker, $categories, $topics) {
            $category = $categories->random();
            return (object) [
                'id' => $i,
                'author' => $faker->name,
                'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode($faker->firstName) . '&background=random',
                'category' => strtoupper($category['name']),
                'category_color' => str_replace('from-', 'text-', explode(' ', $category['color'])[0]) . ' bg-slate-100', // Generate warna text senada
                'time' => $faker->numberBetween(1, 24) . ' jam yang lalu',
                'title' => $faker->randomElement($topics),
                'excerpt' => $faker->realText(120),
                'replies' => $faker->numberBetween(0, 150),
                'likes' => $faker->numberBetween(5, 500),
                'views' => $faker->numberBetween(100, 5000),
            ];
        });

        return view('komunitas.index', compact('categories', 'discussions'));
    }
}