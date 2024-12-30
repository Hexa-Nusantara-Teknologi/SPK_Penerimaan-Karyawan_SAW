<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criteria::create([
            'name' => 'Psikotes',
            'weight' => 20,
        ]);
        Criteria::create([
            'name' => 'Soft Skill',
            'weight' => 20,
        ]);
        Criteria::create([
            'name' => 'CV',
            'weight' => 20,
        ]);
        Criteria::create([
            'name' => 'Radikalisme',
            'weight' => 10,
        ]);
        Criteria::create([
            'name' => 'Terorisme',
            'weight' => 10,
        ]);
        Criteria::create([
            'name' => 'Pengalaman Kerja',
            'weight' => 20,
        ]);
    }
}