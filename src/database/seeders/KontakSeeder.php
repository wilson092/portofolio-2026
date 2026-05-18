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
            'email' => 'wilsonfabian6218@student.esaunggul.ac.id',
            'no_telpon' => '081218619215',
            'github' => 'https://github.com/wilson092',
        ]);
    }
}