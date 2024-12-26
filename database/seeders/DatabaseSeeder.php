<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\Criteria;
// use App\Models\SubCriteria;
// use App\Models\Pertanyaan;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                UsersSeeder::class,
                CriteriaSeeder::class,
                SubCriteriaSeeder::class,
                PertanyaanSeeder::class,

            ]
        );
    }
}
