<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pertanyaan::create([
            'criteria_id' => 1, // Kategori: Soal Psikotes
            'pertanyaan_text' => 'Apakah warna langit di siang hari?',
            'jawaban_a' => 'Biru',
            'jawaban_b' => 'Hijau',
            'jawaban_c' => 'Merah',
            'jawaban_d' => 'Kuning',
            'jawaban_benar' => 'jawaban_a',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Pertanyaan::create([
            'criteria_id' => 2, // Kategori: Soal Soft Skill
            'pertanyaan_text' => 'Apa yang dilakukan ketika seseorang meminta bantuan?',
            'jawaban_a' => 'Mengabaikan',
            'jawaban_b' => 'Membantu dengan tulus',
            'jawaban_c' => 'Menunda-nunda',
            'jawaban_d' => 'Meminta orang lain untuk membantu',
            'jawaban_benar' => 'jawaban_b',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
