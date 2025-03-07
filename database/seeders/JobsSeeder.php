<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs')->insert([
            [
                'companyname' => 'Kuboya', 
                'startdate' => '2018-06-01', 
                'enddate' => '2018-08-01',
                'companydescription' => 'Construction',
                'location' => 'Gorinchem',
                'jobtitle' => 'Laborer',
                'status' => 'completed',
                'intern' => false,
                'contactperson' => 'Bektas Zorlu',
            ],
            [
                'companyname' => 'Udea', 
                'startdate' => '2018-11-01', 
                'enddate' => '2019-02-01',
                'companydescription' => 'Warehouse',
                'location' => 'Veghel',
                'jobtitle' => 'Order Picker',
                'status' => 'completed',
                'intern' => true,
                'contactperson' => 'Ilyas',
            ],
            [
                'companyname' => 'Educademy', 
                'startdate' => '2020-10-01', 
                'enddate' => '2021-01-01',
                'companydescription' => 'E-learning',
                'location' => 'Dreumel',
                'jobtitle' => 'Video Editor and Service Desk',
                'status' => 'completed',
                'intern' => true,
                'contactperson' => 'Ivo Wouters & Barry Kuijpers',
            ],
            [
                'companyname' => 'WebWizards', 
                'startdate' => '2023-08-01', 
                'enddate' => '2024-01-01',
                'companydescription' => 'Web Development',
                'location' => 'Cuijk',
                'jobtitle' => 'Full Stack Developer',
                'status' => 'completed',
                'intern' => true,
                'contactperson' => 'Bas Kivits',
            ],
            [
                'companyname' => 'Fieldproject Staad', 
                'startdate' => '2024-10-30', 
                'enddate' => '2024-12-18',
                'companydescription' => '',
                'location' => 'Veghel',
                'jobtitle' => 'Fieldproject Team Member',
                'status' => 'completed',
                'intern' => false,
                'contactperson' => 'Constanze Thomassen',
            ],
            [
                'companyname' => 'E-captain', 
                'startdate' => '2025-02-24', 
                'enddate' => '2025-06-06',
                'companydescription' => 'Software Development',
                'location' => 'Den Bosch',
                'jobtitle' => 'Developer',
                'status' => 'active',
                'intern' => true,
                'contactperson' => 'Mari van Aggelen',
            ]
        ]);
    }
}
