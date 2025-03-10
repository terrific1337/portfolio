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
                'companydescription' => 'Kuboya is a construction and architecture company founded by Bektas Zorlu, who works as both an architect and project manager. The company specializes in architectural design, construction, and project execution, with a hands-on approach where the founder actively collaborates with clients on-site to bring projects to life from concept to completion.',
                'location' => 'Gorinchem',
                'jobtitle' => 'Laborer',
                'status' => 'completed',
                'intern' => false,
                'contactperson' => 'Bektas Zorlu',
                'companylogo' => 'storage/images/kuboya_logo.png',
                'jobdescription' => 'During my summer job at Kuboya, I supported the specialists on the construction site with various tasks. I assisted by bringing tools, transporting materials like stones, and occasionally helping with parts of the construction work. This role gave me a closer look into practical construction work and how on-site collaboration happens in real architectural projects.',
                'companysector' => 'Construction / Architecture & Project Management',
                'companywebsite' => 'https://www.kuboya.nl/',
            ],
            [
                'companyname' => 'Udea', 
                'startdate' => '2018-11-01', 
                'enddate' => '2019-02-01',
                'companydescription' => 'UDEA (Udea B.V.) is a Dutch wholesaler and distributor of organic food products, operating both retail and wholesale channels, and known for supplying organic supermarkets such as Ekoplaza and supporting sustainable, environmentally friendly food chains.',
                'location' => 'Veghel',
                'jobtitle' => 'Order Picker',
                'status' => 'completed',
                'intern' => true,
                'contactperson' => 'Ilyas',
                'companylogo' => 'storage/images/udea_logo.png',
                'jobdescription' => 'At UDEA, I worked as an order picker in the logistics department. Using a digital tool to view incoming orders, I collected the required products from designated storage sections while driving along the aisles with an order-picking cart. Once completed, I delivered the picked items to the distribution area, where they were prepared for loading into trucks. This role taught me the importance of efficiency, accuracy, and teamwork in a fast-paced logistical environment.',
                'companysector' => 'Organic Food Distribution & Logistics',
                'companywebsite' => 'https://www.udea.nl/',
            ],
            [
                'companyname' => 'Educademy', 
                'startdate' => '2020-10-01', 
                'enddate' => '2021-01-01',
                'companydescription' => 'Educademy is an online learning platform that offers digital training and e-learning solutions for businesses and organizations, helping them develop and manage internal knowledge and employee training through customized educational content.',
                'location' => 'Dreumel',
                'jobtitle' => 'Video Editor and Service Desk',
                'status' => 'completed',
                'intern' => true,
                'contactperson' => 'Ivo Wouters & Barry Kuijpers',
                'companylogo' => 'storage/images/educademy_logo.png',
                'jobdescription' => 'During my internship at Educademy, I was officially in the role of an ICT support trainee, but my actual contributions focused more on my creative and media skills. I created instructional and promotional videos for their clients, applying the video editing experience I had developed over the years from making YouTube content. I assisted in filming product footage and edited it into structured guides with sections and timestamps. Additionally, I contributed to their learning platform by working on a tool that allowed students from partner schools to follow digital lessons created by Educademy or based on teacher input.',
                'companysector' => 'E-Learning / Digital Training Solutions',
                'companywebsite' => 'https://www.educademy.nl/',
            ],
            [
                'companyname' => 'WebWizards', 
                'startdate' => '2023-08-01', 
                'enddate' => '2024-01-01',
                'companydescription' => 'WebWizards is a student-run company at Koning Willem I College (KW1C) where students work on real-world digital projects such as websites, webshops, and digital marketing assignments for external clients, gaining hands-on experience in a professional setting.',
                'location' => 'Cuijk',
                'jobtitle' => 'Full Stack Developer',
                'status' => 'completed',
                'intern' => true,
                'contactperson' => 'Bas Kivits',
                'companylogo' => 'storage/images/webwizards_logo.png',
                'jobdescription' => 'During my time at WebWizards, I worked on a real project for an external client — Campus Uden, a company where students come together to collaborate and work towards shared goals. The client needed a tool to manage information about partner companies that financially support the initiative. My role was to help develop a system where these companies could be added and linked to different collaboration packages. Additionally, the tool allowed for managing intern data and matching students with companies based on their background and skill sets. This project gave me valuable experience in working with client requirements, building structured and functional tools, and collaborating in a professional environment.',
                'companysector' => 'ducation / IT – Web Development & Digital Services',
                'companywebsite' => 'http://www.webwizardskw1c.nl/',
            ],
            [
                'companyname' => 'Fieldproject Staad', 
                'startdate' => '2024-10-30', 
                'enddate' => '2024-12-18',
                'companydescription' => 'Staad B.V. is a supplier of earth-moving and construction machinery, specializing in the sales, service, and maintenance of Doosan equipment for the infrastructure, construction, and agricultural sectors.',
                'location' => 'Veghel',
                'jobtitle' => 'Fieldproject Team Member',
                'status' => 'completed',
                'intern' => false,
                'contactperson' => 'Constanze Thomassen',
                'companylogo' => 'storage/images/staad_logo.png',
                'jobdescription' => 'As part of a field project at Staad, I worked in a multidisciplinary learning team consisting of students, teachers, organization coordinators, and Staad employees. Together, we collaborated equally on a company project over the course of eight weeks, meeting weekly on Wednesdays. Our goal was to define learning objectives and develop a Power BI dashboard (cockpit) using large datasets provided by Staad. The dashboard was aimed at visualizing key business insights, such as financial gains and losses, in a clear and compact way.',
                'companysector' => 'Construction Equipment & Machinery',
                'companywebsite' => 'https://www.staad-groep.nl/',
            ],
            [
                'companyname' => 'E-captain', 
                'startdate' => '2025-02-24', 
                'enddate' => '2025-06-06',
                'companydescription' => 'E-Captain provides SaaS-based software solutions for clubs, associations, and organizations to manage membership administration, communication, finances, and website integration in one user-friendly platform.',
                'location' => 'Den Bosch',
                'jobtitle' => 'Developer',
                'status' => 'active',
                'intern' => true,
                'contactperson' => 'Mari van Aggelen',
                'companylogo' => 'storage/images/e_captain_logo.png',
                'jobdescription' => 'As an intern, I am learning their way of working and coding around their product, with a strong focus on picking up Laravel and Vue.js from scratch and applying them within their development methods and standards.',
                'companysector' => 'SaaS – Membership Management Software',
                'companywebsite' => 'https://www.e-captain.nl/',
            ]
        ]);
    }
}
