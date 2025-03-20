<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->insert([
            [
                'name' => 'Pierre Ruijters',
                'title' => 'Software Developer Teacher',
                'content' => 'I’ve seen Anilcan grow into someone who takes their work seriously and always brings structure and calm to a team. They’re reliable, thoughtful, and consistently put real effort into everything they do.',
                'photo' => 'storage/images/pierre_ruijters.png',
                'featured' => 0,
            ],
            [
                'name' => 'Francy Verwaard',
                'title' => 'Software Developer Teacher',
                'content' => 'Anilcan has always stood out for their curiosity and steady, no-nonsense way of working. They’re someone you can count on—focused, helpful, and genuinely invested in what they do.',
                'photo' => 'storage/images/francy_verwaard.png',
                'featured' => 0,
            ],
            [
                'name' => 'Cas Eras',
                'title' => 'Software Developer Student',
                'content' => 'After working together on so many projects, I can honestly say Anilcan is one of the most reliable people I’ve worked with. Always focused, easy to communicate with, and just great to have in a team. We’ve become close friends over the years, and that says a lot about how naturally they work with people.',
                'photo' => 'storage/images/cas_eras.png',
                'featured' => 0,
            ],
            [
                'name' => 'Elon Musk',
                'title' => 'CEO, X, SpaceX & Tesla',
                'content' => 'Anilcan has the kind of work ethic and mindset that actually gets things done. That’s what matters.',
                'photo' => 'storage/images/elon_musk.png',
                'featured' => 0,
            ],
            [
                'name' => 'David Goggins',
                'title' => 'Retired Navy SEAL',
                'content' => 'Anilcan shows up when it’s hard. Most people quit when it gets uncomfortable—Anilcan doesn’t. That says everything.',
                'photo' => 'storage/images/david_goggins.png',
                'featured' => 0,
            ],
            [
                'name' => 'Yusuf Kursat Bucakli',
                'title' => 'Professional Goalkeeper',
                'content' => 'I’ve known Anilcan for over a decade, and I’ve always admired how focused and driven they are. Whether it’s work or life, they’re someone who shows up, puts in the effort, and doesn’t take shortcuts. That mindset is just who they are—it’s one of the reasons we’ve always clicked.',
                'photo' => 'storage/images/yusuf_bucakli.png',
                'featured' => 0,
            ],
            [
                'name' => 'Donald J. Trump',
                'title' => 'President of the United States',
                'content' => 'Anilcan is absolutely fantastic—very smart, very talented. I’ve seen a lot of people, believe me, and this one stands out. Works hard, thinks big, and gets results. Just a tremendous person. Really impressive.',
                'photo' => 'storage/images/donald_trump.png',
                'featured' => 0,
            ],
        ]);
    }
}
