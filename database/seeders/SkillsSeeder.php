<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Skills
        DB::table('skills')->insert([
            [
                'name' => 'Laravel',
                'icon' => 'storage/images/Laravel.png',
            ],
            [
                'name' => 'PHP',
                'icon' => 'storage/images/php.png',
            ],
            [
                'name' => 'Vue.js',
                'icon' => 'storage/images/vue.png',
            ],
            [
                'name' => 'Javascript',
                'icon' => 'storage/images/javascript.png',
            ],
            [
                'name' => 'HTML',
                'icon' => 'storage/images/html.png',
            ],
            [
                'name' => 'CSS',
                'icon' => 'storage/images/css.png',
            ],
            [
                'name' => 'Debugging & Testing',
                'icon' => 'storage/images/bug.png',
            ],
            [
                'name' => 'MySQL',
                'icon' => 'storage/images/mysql.png',
            ],
            [
                'name' => 'phpMyAdmin',
                'icon' => 'storage/images/phpmyadmin.png',
            ],
            [
                'name' => 'Power BI',
                'icon' => 'storage/images/powerbi.png',
            ],
            [
                'name' => 'Database Normalization',
                'icon' => 'storage/images/normalization.png',
            ],
            [
                'name' => 'Git',
                'icon' => 'storage/images/Git.png',
            ],
            [
                'name' => 'GitHub',
                'icon' => 'storage/images/github.png',
            ],
            [
                'name' => 'GitLab',
                'icon' => 'storage/images/gitlab.png',
            ],
            [
                'name' => 'VS Code',
                'icon' => 'storage/images/vscode.png',
            ],
            [
                'name' => 'XAMPP',
                'icon' => 'storage/images/XAMPP.png',
            ],
            [
                'name' => 'Figma',
                'icon' => 'storage/images/figma.png',
            ],
            [
                'name' => 'Adobe XD',
                'icon' => 'storage/images/xd.png',
            ],
            [
                'name' => 'Trello',
                'icon' => 'storage/images/trello.png',
            ],
            [
                'name' => 'Scrum & Agile',
                'icon' => 'storage/images/scrum.png',
            ],
            [
                'name' => 'Slack',
                'icon' => 'storage/images/slack.png',
            ],
            [
                'name' => 'Microsoft Office',
                'icon' => 'storage/images/Microsoft_Office.png',
            ],
            [
                'name' => 'Sony Vegas Pro',
                'icon' => 'storage/images/vegaspro.png',
            ],
            [
                'name' => 'OBS',
                'icon' => 'storage/images/OBS.png',
            ],
            [
                'name' => "API's",
                'icon' => 'storage/images/api.png',
            ],
        ]);

        // Seed Categories
        DB::table('categories')->insert([
            ['name' => 'Web Development'],
            ['name' => 'Databases & Handling'],
            ['name' => 'Version Control & Tools'],
            ['name' => 'UI/UX & Design'],
            ['name' => 'Project Management & Workflow'],
            ['name' => 'Other Skills'],
            ['name' => "What's Next?"],
        ]);

        // Seed Pivot Table (skill_category)
        DB::table('skill_category')->insert([
            // Web Development category
            ['skill_id' => 1, 'category_id' => 1], // Laravel
            ['skill_id' => 2, 'category_id' => 1], // PHP
            ['skill_id' => 3, 'category_id' => 1], // Vue.js
            ['skill_id' => 4, 'category_id' => 1], // Javascript
            ['skill_id' => 5, 'category_id' => 1], // HTML
            ['skill_id' => 6, 'category_id' => 1], // CSS
            ['skill_id' => 7, 'category_id' => 1], // Debugging & Testing
        
            // Databases & Handling
            ['skill_id' => 8, 'category_id' => 2], // MySQL
            ['skill_id' => 9, 'category_id' => 2], // phpMyAdmin
            ['skill_id' => 10, 'category_id' => 2], // Power BI
            ['skill_id' => 11, 'category_id' => 2], // Database Normalization

            // Version Control & Tools
            ['skill_id' => 12, 'category_id' => 3], // Git
            ['skill_id' => 13, 'category_id' => 3], // Github
            ['skill_id' => 14, 'category_id' => 3], // Gitlab
            ['skill_id' => 15, 'category_id' => 3], // VS Code
            ['skill_id' => 16, 'category_id' => 3], // XAMPP

            // UI/UX & Design
            ['skill_id' => 17, 'category_id' => 4], // Figma
            ['skill_id' => 18, 'category_id' => 4], // Adobe XD

            // Project Management & Workflow
            ['skill_id' => 19, 'category_id' => 5], // Trello
            ['skill_id' => 20, 'category_id' => 5], // Scrum & Agile
            ['skill_id' => 21, 'category_id' => 5], // Slack

            // Other Skills
            ['skill_id' => 22, 'category_id' => 6], // Microsoft Office
            ['skill_id' => 23, 'category_id' => 6], // Sony Vegas Pro
            ['skill_id' => 24, 'category_id' => 6], // OBS

            // What's Next?
            ['skill_id' => 1, 'category_id' => 7], // Laravel
            ['skill_id' => 3, 'category_id' => 7], // Vue.js
            ['skill_id' => 25, 'category_id' => 7], // API's
        ]);
    }
}
