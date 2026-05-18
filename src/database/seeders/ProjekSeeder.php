<?php

namespace Database\Seeders;

use App\Models\Projek;
use Illuminate\Database\Seeder;

class ProjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Projek::create([
            'judul' => 'WeatherInsight(UTS)',
            'deskripsi' => 'Website monitoring cuaca realtime berbasis Laravel dan Filament. Dikerjakan untuk tugas akhir mata kuliah Pemrograman Web.',
            'nim' => '20240801098',
            'link' => 'https://github.com/wilson092/WeatherInsight',
            'status_progress' => 'Belum Selesai',
        ]);
        Projek::create([
            'judul' => 'Currency Converter',
            'deskripsi' => 'Aplikasi konversi mata uang secara realtime.',
            'nim' => '20240801098',
            'link' => 'https://github.com/wilson092/PROJECT-AKHIR-PBO-CR001-',
            'status_progress' => 'Selesai',
        ]);
        Projek::create([
            'judul' => 'Grafik Kalkulus 2D',
            'deskripsi' => 'Aplikasi visualisasi grafik fungsi matematika dua dimensi.',
            'nim' => '20240801098',
            'link' => 'https://github.com/wilson092/Grafik-Kalkulus-2D',
            'status_progress' => 'Selesai',
        ]);

        Projek::create([
            'judul' => 'Chatbot Sederhana',
            'deskripsi' => 'Aplikasi chatbot sederhana(iseng aja buat tes ilmu belajar API).',
            'nim' => '20240801098',
            'link' => 'https://github.com/wilson092/Chatbot',
            'status_progress' => 'Belum Selesai',
        ]);
    }
}