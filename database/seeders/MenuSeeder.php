<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu')->insert([
            ['id' => 1, 'name' => 'Home', 'level' => 0],
            ['id' => 2, 'name' => 'About Me', 'level' => 0],
            ['id' => 3, 'name' => 'Projects', 'level' => 0],
            ['id' => 4, 'name' => 'Skills', 'level' => 0],
            ['id' => 5, 'name' => 'Jobs', 'level' => 0],
            ['id' => 6, 'name' => 'Contact', 'level' => 0],
            ['id' => 98, 'name' => 'Dashboard', 'level' => 5]
        ]);
    }
}
