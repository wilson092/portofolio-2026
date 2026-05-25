<?php

namespace Database\Seeders;

use App\Models\Projek;
use Illuminate\Database\Seeder;

class ProjekSeeder extends Seeder
{
    public function run(): void
    {
        Projek::truncate();

        Projek::create([
            'judul' => 'WeatherInsight (Projek Akhir)',
            'deskripsi' => 'WeatherInsight merupakan aplikasi monitoring cuaca real-time berbasis web yang dibangun menggunakan Laravel, Filament, Livewire, MariaDB, Docker, dan OpenWeather API. Sistem dapat menampilkan data cuaca secara realtime, menyimpan histori monitoring, serta memberikan insight dan rekomendasi sederhana berdasarkan kondisi cuaca.',
            'link' => 'https://github.com/wilson092/WeatherInsight',
            'status_progress' => 'Belum Selesai',
            'laporan_pdf' => 'docs/Laporan Awal Projek Akhir -20240801098 Wilson Fabian.pdf',
            'analisis_masalah' => 'Sebagian besar platform cuaca hanya menampilkan informasi umum tanpa analisis sederhana yang mudah dipahami pengguna. Selain itu belum semua sistem menyediakan histori monitoring cuaca dan dashboard administrasi yang terstruktur. WeatherInsight dikembangkan untuk menyediakan monitoring cuaca realtime, histori data, analisis kondisi cuaca, serta rekomendasi aktivitas',
            'kebutuhan_sistem' => 'pengambilan data cuaca realtime dari OpenWeather API, dashboard monitoring dan histori cuaca, autentikasi user dan admin, panel administrasi, analisis cuaca dan prediksi. ',
            
            'arsitektur' => 'Frontend dibangun menggunakan Blade dan Livewire, backend menggunakan Laravel untuk logika bisnis dan integrasi OpenWeather API, database menggunakan MariaDB, serta panel administrasi menggunakan Filament v3.',
            'tech_stack' => [
                        'Laravel',
                        'Filament',
                        'Docker',
                        'Blade',
                    ],
            'diagram' => 'docs/weatherinsight.png',
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
            'deskripsi' => 'Aplikasi chatbot sederhana (iseng aja buat tes ilmu belajar).',
            'link' => 'https://github.com/wilson092/Chatbot',
            'status_progress' => 'Selesai',
            'laporan_pdf' => null,
        ]);
    }
}