<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\SubCriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Soal Psikotes
        Subcriteria::create(['criteria_id' => 1, 'name' => 'Sangat Baik', 'min_score' => 80, 'max_score' => 100]);
        Subcriteria::create(['criteria_id' => 1, 'name' => 'Baik', 'min_score' => 70, 'max_score' => 79]);
        Subcriteria::create(['criteria_id' => 1, 'name' => 'Cukup', 'min_score' => 50, 'max_score' => 69]);
        Subcriteria::create(['criteria_id' => 1, 'name' => 'Buruk', 'min_score' => 30, 'max_score' => 49]);
        Subcriteria::create(['criteria_id' => 1, 'name' => 'Sangat Buruk', 'min_score' => 0, 'max_score' => 29]);

        // Soal Soft Skill
        Subcriteria::create(['criteria_id' => 2, 'name' => 'Sangat Baik', 'min_score' => 80, 'max_score' => 100]);
        Subcriteria::create(['criteria_id' => 2, 'name' => 'Baik', 'min_score' => 70, 'max_score' => 79]);
        Subcriteria::create(['criteria_id' => 2, 'name' => 'Cukup', 'min_score' => 50, 'max_score' => 69]);
        Subcriteria::create(['criteria_id' => 2, 'name' => 'Buruk', 'min_score' => 30, 'max_score' => 49]);
        Subcriteria::create(['criteria_id' => 2, 'name' => 'Sangat Buruk', 'min_score' => 0, 'max_score' => 29]);

        // CV
        Subcriteria::create(['criteria_id' => 3, 'name' => 'Sangat Baik', 'min_score' => 80, 'max_score' => 100]);
        Subcriteria::create(['criteria_id' => 3, 'name' => 'Baik', 'min_score' => 70, 'max_score' => 79]);
        Subcriteria::create(['criteria_id' => 3, 'name' => 'Cukup', 'min_score' => 50, 'max_score' => 69]);
        Subcriteria::create(['criteria_id' => 3, 'name' => 'Buruk', 'min_score' => 30, 'max_score' => 49]);
        Subcriteria::create(['criteria_id' => 3, 'name' => 'Sangat Buruk', 'min_score' => 0, 'max_score' => 29]);

        // Radikalisme
        Subcriteria::create(['criteria_id' => 4, 'name' => 'Sangat Baik', 'min_score' => 80, 'max_score' => 100]);
        Subcriteria::create(['criteria_id' => 4, 'name' => 'Baik', 'min_score' => 70, 'max_score' => 79]);
        Subcriteria::create(['criteria_id' => 4, 'name' => 'Cukup', 'min_score' => 50, 'max_score' => 69]);
        Subcriteria::create(['criteria_id' => 4, 'name' => 'Buruk', 'min_score' => 30, 'max_score' => 49]);
        Subcriteria::create(['criteria_id' => 4, 'name' => 'Sangat Buruk', 'min_score' => 0, 'max_score' => 29]);

        // Terorisme
        Subcriteria::create(['criteria_id' => 5, 'name' => 'Sangat Baik', 'min_score' => 80, 'max_score' => 100]);
        Subcriteria::create(['criteria_id' => 5, 'name' => 'Baik', 'min_score' => 70, 'max_score' => 79]);
        Subcriteria::create(['criteria_id' => 5, 'name' => 'Cukup', 'min_score' => 50, 'max_score' => 69]);
        Subcriteria::create(['criteria_id' => 5, 'name' => 'Buruk', 'min_score' => 30, 'max_score' => 49]);
        Subcriteria::create(['criteria_id' => 5, 'name' => 'Sangat Buruk', 'min_score' => 0, 'max_score' => 29]);

        // Pengalaman Kerja
        Subcriteria::create(['criteria_id' => 6, 'name' => 'Sangat Baik', 'min_score' => 80, 'max_score' => 100]);
        Subcriteria::create(['criteria_id' => 6, 'name' => 'Baik', 'min_score' => 70, 'max_score' => 79]);
        Subcriteria::create(['criteria_id' => 6, 'name' => 'Cukup', 'min_score' => 50, 'max_score' => 69]);
        Subcriteria::create(['criteria_id' => 6, 'name' => 'Buruk', 'min_score' => 30, 'max_score' => 49]);
        Subcriteria::create(['criteria_id' => 6, 'name' => 'Sangat Buruk', 'min_score' => 0, 'max_score' => 29]);
    }
}
