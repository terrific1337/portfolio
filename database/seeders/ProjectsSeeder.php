<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'name' => 'Volleybal Tournament App',
                'description' => 'This is a basic volleyball tournament app created for a school project. It allows users to create teams, schedule matches, and track scores throughout the tournament. The app helps keep everything organized and makes managing a tournament easier.',
                'repo' => 'https://github.com/terrific1337/volleybal_toernooi',
                'screenshot' => 'storage/images/volleyball_tournament_screenshot.png',
                'demo' => '',
                'status' => 'completed',
                'category' => 'school',
                'featured' => false,
                'order' => 6,
            ],
            [
                'name' => 'RijschoolApp',
                'description' => 'RijschoolApp is a mock driving school project made for school. The app provides basic information about the driving school, available lessons, and contact details. It’s designed to give users a clear overview of services and help them get in touch easily.',
                'repo' => 'https://github.com/terrific1337/RijschoolApp',
                'screenshot' => 'storage/images/rijschoolapp_screenshot.png',
                'demo' => '',
                'status' => 'completed',
                'category' => 'school',
                'featured' => false,
                'order' => 3,
            ],
            [
                'name' => 'Sail Away',
                'description' => 'Sail Away is a mock boat rental project made for school. The app lets users explore available boats, check prices, and make a reservation for a few days. It’s designed to give a clear overview of rental options and make booking easy.',
                'repo' => 'https://github.com/terrific1337/sail-away',
                'screenshot' => 'storage/images/sail_away_screenshot.png',
                'demo' => '',
                'status' => 'completed',
                'category' => 'school',
                'featured' => false,
                'order' => 4,
            ],
            [
                'name' => 'Portfolio',
                'description' => 'This portfolio website was developed during my internship to showcase my skills, projects, and experience as a developer. It’s designed to reflect my personal style and serve as a central hub for everything I’ve worked on, from web development to creative projects.',
                'repo' => 'https://github.com/terrific1337/portfolio',
                'screenshot' => 'storage/images/portfolio_screenshot.png',
                'demo' => '',
                'status' => 'in progress',
                'category' => 'personal',
                'featured' => false,
                'order' => 2,
            ],
            [
                'name' => 'Campus',
                'description' => 'This management tool was developed during my internship at KW1C WebWizards for a client called Campus. It allows an admin to efficiently match students with companies for internships based on skills and interests.',
                'repo' => 'https://github.com/terrific1337/campus-project',
                'screenshot' => 'storage/images/campus_screenshot.png',
                'demo' => '',
                'status' => 'completed',
                'category' => 'school',
                'featured' => false,
                'order' => 5,
            ],
            [
                'name' => 'test',
                'description' => 'this is a test description for a test project that is still in progress and will be completed soon.',
                'repo' => '',
                'screenshot' => '',
                'demo' => '',
                'status' => 'planned',
                'category' => 'work',
                'featured' => false,
                'order' => 1,
            ]
        ]);
    }
}
