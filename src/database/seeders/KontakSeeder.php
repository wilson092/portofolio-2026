<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Kontak::create([
            'nama' => 'Wilson Fabian',
            'profesi' => 'Web Developer',
            'email' => 'wilsonfabian6218@gmail.com',
            'no_telpon' => '081218619215',
            'github' => 'https://github.com/wilson092',
            'deskripsi' =>'Nama saya Wilson Fabian, mahasiswa Teknik Informatika semester 4. Saya mulai tertarik dengan dunia 
               programming sejak masa SMK, dan sekarang saya terus mengembangkan kemampuan saya di Universitas Esa Unggul.
                Saya senang mengerjakan project-project yang bermanfaat, 
                karena saya percaya teknologi bisa membantu mempermudah kehidupan banyak orang. 
              ',
            'tech_stack' => ['PHP', 'JavaScript', 'Laravel', 'MySQL', 'Git', 'Docker'],

        ]);
    }
}