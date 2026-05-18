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
            'judul' => 'WeatherInsight (Projek Akhir)',
            'deskripsi' => 'Website monitoring cuaca realtime berbasis Laravel dan Filament. Dikerjakan untuk tugas akhir mata kuliah Pemrograman Web.',
            'link' => 'https://github.com/wilson092/WeatherInsight',
            'status_progress' => 'Belum Selesai',
            'laporan_pdf' => 'docs/Laporan Awal Projek Akhir -20240801098 Wilson Fabian.pdf',
        ]);

        Projek::create([
            'judul' => 'Currency Converter',
            'deskripsi' => 'Aplikasi konversi mata uang secara realtime.',
            'link' => 'https://github.com/wilson092/PROJECT-AKHIR-PBO-CR001-',
            'status_progress' => 'Selesai',
            'laporan_pdf' => 'docs/PBO.pdf',
        ]);

        Projek::create([
            'judul' => 'Grafik Kalkulus 2D',
            'deskripsi' => 'Aplikasi visualisasi grafik fungsi matematika dua dimensi.',
            'link' => 'https://github.com/wilson092/Grafik-Kalkulus-2D',
            'status_progress' => 'Selesai',
            'laporan_pdf' => 'docs/KALKULUS 2.pdf',
        ]);

        Projek::create([
            'judul' => 'Chatbot Sederhana',
            'deskripsi' => 'Aplikasi chatbot sederhana (iseng aja buat tes ilmu belajar API).',
            'link' => 'https://github.com/wilson092/Chatbot',
            'status_progress' => 'Selesai',
            'laporan_pdf' => null,
        ]);
    }
}