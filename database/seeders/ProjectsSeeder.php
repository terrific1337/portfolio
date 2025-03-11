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
        // Seed Tags
        DB::table('tags')->insert([
            ['name' => 'Laravel'],
            ['name' => 'PHP'],
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'Javascript'],
            ['name' => 'MySQL'],
            ['name' => 'Vue.js'],
            ['name' => 'Bootstrap'],
            ['name' => 'Web Development'],
            ['name' => 'Mobile Development'],
            ['name' => 'Desktop Development'],
            ['name' => 'Game Development'],
            ['name' => 'Responsive'],
            ['name' => 'Power BI'],
            ['name' => 'Authentication'],
            ['name' => 'Authorization'],
            ['name' => 'API'],
            ['name' => 'CRUD'],
            ['name' => 'Unity'],
            ['name' => 'Unreal Engine'],
            ['name' => 'Blender'],
            ['name' => 'Dashboard'],
            ['name' => 'Fullstack'],
            ['name' => 'Frontend'],
            ['name' => 'Backend'],
            ['name' => 'E-commerce'],
            ['name' => 'Data Visualization'],
            ['name' => 'Charts'],
            ['name' => 'SaaS'],
        ]);

        // Seed Projects
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
                'order' => 7,
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
                'status' => 'in-progress',
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
                'order' => 6,
            ],
            [
                'name' => 'test',
                'description' => 'this is a test description for a test project that is still in progress and will be completed soon.',
                'repo' => '',
                'screenshot' => 'storage/images/test_screenshot.png',
                'demo' => '',
                'status' => 'planned',
                'category' => 'work',
                'featured' => false,
                'order' => 1,
            ],
            [
                'name' => 'Fieldproject Staad',
                'description' => 'In this field project, I collaborated with a team of skilled individuals proficient in Power BI. Our task was to integrate data from Staad into Power BI, leveraging our diverse backgrounds to achieve this goal.',
                'repo' => '',
                'screenshot' => 'storage/images/staad_screenshot.png',
                'demo' => '',
                'status' => 'completed',
                'category' => 'work',
                'featured' => false,
                'order' => 5,
            ],
        ]);
        
        // Seed Pivot Table (project_tag)
        DB::table('project_tag')->insert([
            // Volleybal Tournament App
            ['project_id' => 1, 'tag_id' => 2], // PHP
            ['project_id' => 1, 'tag_id' => 3], // HTML
            ['project_id' => 1, 'tag_id' => 4], // CSS
            ['project_id' => 1, 'tag_id' => 6], // MySQL
            ['project_id' => 1, 'tag_id' => 9], // Web Development
            ['project_id' => 1, 'tag_id' => 18], // CRUD 

            // RijschoolApp
            ['project_id' => 2, 'tag_id' => 2], // PHP 
            ['project_id' => 2, 'tag_id' => 3], // HTML
            ['project_id' => 2, 'tag_id' => 4], // CSS
            ['project_id' => 2, 'tag_id' => 6], // MySQL
            ['project_id' => 2, 'tag_id' => 9], // Web Development
            ['project_id' => 2, 'tag_id' => 15], // Authentication
            ['project_id' => 2, 'tag_id' => 18], // CRUD
            ['project_id' => 2, 'tag_id' => 23], // Fullstack
            ['project_id' => 2, 'tag_id' => 22], // Dashboard

            // Sail Away
            ['project_id' => 3, 'tag_id' => 2], // PHP
            ['project_id' => 3, 'tag_id' => 3], // HTML
            ['project_id' => 3, 'tag_id' => 4], // CSS
            ['project_id' => 3, 'tag_id' => 5], // Javascript
            ['project_id' => 3, 'tag_id' => 6], // MySQL
            ['project_id' => 3, 'tag_id' => 9], // Web Development
            ['project_id' => 3, 'tag_id' => 15], // Authentication
            ['project_id' => 3, 'tag_id' => 18], // CRUD
            ['project_id' => 3, 'tag_id' => 23], // Fullstack

            // Portfolio
            ['project_id' => 4, 'tag_id' => 1], // Laravel
            ['project_id' => 4, 'tag_id' => 2], // PHP
            ['project_id' => 4, 'tag_id' => 3], // HTML
            ['project_id' => 4, 'tag_id' => 4], // CSS
            ['project_id' => 4, 'tag_id' => 6], // MySQL
            ['project_id' => 4, 'tag_id' => 7], // Vue.js
            ['project_id' => 4, 'tag_id' => 9], // Web Development
            ['project_id' => 4, 'tag_id' => 23], // Fullstack

            // Campus
            ['project_id' => 5, 'tag_id' => 2], // PHP
            ['project_id' => 5, 'tag_id' => 3], // HTML
            ['project_id' => 5, 'tag_id' => 4], // CSS
            ['project_id' => 5, 'tag_id' => 6], // MySQL
            ['project_id' => 5, 'tag_id' => 9], // Web Development
            ['project_id' => 5, 'tag_id' => 15], // Authentication
            ['project_id' => 5, 'tag_id' => 18], // CRUD
            ['project_id' => 5, 'tag_id' => 22], // Dashboard
            ['project_id' => 5, 'tag_id' => 23], // Fullstack
            
            // test
            //['project_id' => 6, 'tag_id' => 1], Laravel

            // Fieldproject Staad
            ['project_id' => 7, 'tag_id' => 24], // Dashboard
            ['project_id' => 7, 'tag_id' => 26], // Data Visualization
            ['project_id' => 7, 'tag_id' => 14], // Power BI
            ['project_id' => 7, 'tag_id' => 22], // Dashboard
            ['project_id' => 7, 'tag_id' => 28], // Charts
        ]);
    }
}
