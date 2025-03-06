@extends('layouts.app')

@section('content')
<div class="aboutme-container">
    <h1>Introduction:</h1>
    <div class="aboutme-item">
        <img src="{{ asset('images/person_icon.png') }}" alt="me">
        <p>
            Hey, I'm Anilcan Zorlu, a passionate software developer with a focus on Laravel, PHP, and backend development. 
            I love turning ideas into functional, scalable web applications. I'm always learning and improving, whether it's by optimizing database queries or exploring new tech stacks. 
            Outside of coding, you might find me playing League of Legends or experimenting with new projects.
        </p>
    </div>

    <h1>Background:</h1>
    <div class="aboutme-item">
        <img src="{{ asset('images/background.png') }}" alt="background">
        <p>
            My journey into programming started with my first year as a software developer student at the Veghel MBO School KW1C, 
            where I was introduced to the basics of programming. During my studies, I primarily worked with HTML, CSS, PHP & MySQL. 
            With my last internship, I picked up the Laravel Framework together with Vue. The portfolio you're viewing was created with Laravel & Vue as practice.
        </p>
    </div>

    <h1>What I'm working on right now:</h1>
    <div class="aboutme-item">
        <img src="{{ asset('images/atm.png') }}" alt="atm">
        <p>
            At the moment, I'm working on this portfolio to practice my skills with Laravel. 
            I'm also doing an internship at Dispi / E-captain, where I am developing my portfolio and getting mentorship to improve my Laravel skills.
        </p>
    </div>

    <h1>Hobbies & Interests:</h1>
    <div class="aboutme-item">
        <img src="{{ asset('images/hobbies.png') }}" alt="hobby">
        <p>
            In my free time, I enjoy playing League of Legends, which has been my competitive outlet for over 10 years. 
            I consistently rank in the top 1%. I also love experimenting with new projects, like this portfolio, and always look for ways to learn and improve. 
            Outside of gaming, I lift weights, watch anime, and read manga. Plus, I'm a proud owner of a Shiba Inu.
        </p>
    </div>

    <div class="aboutme-item aboutme-links">
        <p>📧 Email: <a href="mailto:AnilcZorlu@gmail.com">AnilcZorlu@gmail.com</a></p>
        <p>🔗 <a href="https://www.linkedin.com/in/anilcanzorlu/" target="_blank">LinkedIn</a></p>
        <p>💻 <a href="https://github.com/terrific1337?tab=repositories" target="_blank">GitHub</a></p>
    </div>
</div>
@endsection
