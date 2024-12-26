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
            'criteria_id' => 1,
            'pertanyaan_text' => 'Kertas karton yang dibakar akan berubah menjadi ...',
            'jawaban_a' => 'arang',
            'jawaban_b' => 'kayu',
            'jawaban_c' => 'abu',
            'jawaban_d' => 'tanah',
            'jawaban_benar' => 'C',
        ]);

        Pertanyaan::create([
            'criteria_id' => 2,
            'pertanyaan_text' => 'Soft skill adalah kemampuan yang berhubungan dengan ...',
            'jawaban_a' => 'Teknikal',
            'jawaban_b' => 'Emosi dan Sosial',
            'jawaban_c' => 'Kognitif',
            'jawaban_d' => 'Logika',
            'jawaban_benar' => 'B',
        ]);
    }
}
