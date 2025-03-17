<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call your seeders here
        $this->call([
            JobsSeeder::class,
            MenuSeeder::class,
            ProjectsSeeder::class,
            UserSeeder::class,
            SkillsSeeder::class,
            AboutMeSeeder::class,
        ]);
    }
}
