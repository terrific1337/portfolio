<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aboutme')->insert([
            [
                'name' => 'Introduction',
                'text' => 'Hi! I’m Anilcan Zorlu, a passionate backend developer with a strong focus on Laravel and PHP. I love building clean, scalable web applications that solve real problems. My goal is to grow as a developer while contributing to meaningful projects — whether personal, freelance, or team-based.',
                'image' => 'storage/images/person_icon.png',
            ],
            [
                'name' => 'My Journey',
                'text' => 'I started my programming journey at KW1C, Veghel, where I was introduced to HTML, CSS, PHP, and MySQL. Through my internships and self-driven projects, I discovered my passion for backend development. During my latest internship, I picked up the Laravel framework and Vue.js — and this portfolio is a hands-on result of that growth.',
                'image' => 'storage/images/background.png',
            ],
            [
                'name' => "What I'm Working On",
                'text' => 'Currently, I’m continuing to improve my Laravel skills while working on this portfolio and gaining real-world experience during my internship at Dispi / E-captain. I’m focused on writing clean code, and learning from mentorship.',
                'image' => 'storage/images/atm.png',
            ],
            [
                'name' => 'Beyond Coding',
                'text' => 'Outside of coding, I’m a competitive League of Legends player, consistently ranking in the top 1%. I also enjoy building passion projects, lifting weights, watching anime, and reading manga. And yes — I’m a proud Shiba Inu owner.',
                'image' => 'storage/images/hobbies.png',
            ],
        ]);
    }
}
