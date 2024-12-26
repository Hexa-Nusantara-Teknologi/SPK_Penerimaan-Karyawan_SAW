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
            'name' => 'Soal Psikotes',
            'weight' => 30,
        ]);
        Criteria::create([
            'name' => 'Soal Soft Skill',
            'weight' => 50,
        ]);
        Criteria::create([
            'name' => 'CV',
            'weight' => 20,
        ]);
    }
}