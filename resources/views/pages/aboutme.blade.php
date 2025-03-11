@extends('layouts.app')

@section('content')
@include('layouts.partials.header')
<p class="section-subtitle">A brief overview of my background and interests.</p>
<div class="aboutme-container">
    <h1>Introduction</h1>
    <div class="aboutme-item">
        <img src="{{ asset('images/person_icon.png') }}" alt="me">
        <p>
            Hi! I’m <strong>Anilcan Zorlu</strong>, a passionate backend developer with a strong focus on Laravel and PHP. 
            I love building clean, scalable web applications that solve real problems. 
            My goal is to grow as a developer while contributing to meaningful projects — whether personal, freelance, or team-based.
        </p>
    </div>

    <h1>My Journey</h1>
    <div class="aboutme-item">
        <img src="{{ asset('images/background.png') }}" alt="background">
        <p>
            I started my programming journey at <strong>KW1C, Veghel</strong>, where I was introduced to HTML, CSS, PHP, and MySQL. 
            Through my internships and self-driven projects, I discovered my passion for backend development.
            During my latest internship, I picked up the Laravel framework and Vue.js — and this portfolio is a hands-on result of that growth.
        </p>
    </div>

    <h1>What I'm Working On</h1>
    <div class="aboutme-item">
        <img src="{{ asset('images/atm.png') }}" alt="atm">
        <p>
            Currently, I’m continuing to improve my Laravel skills while working on this portfolio and gaining real-world experience during my internship at <strong>Dispi / E-captain</strong>. 
            I’m focused on writing clean code, and learning from mentorship.
        </p>
    </div>

    <h1>Beyond Coding</h1>
    <div class="aboutme-item">
        <img src="{{ asset('images/hobbies.png') }}" alt="hobby">
        <p>
            Outside of coding, I’m a competitive <strong>League of Legends</strong> player, consistently ranking in the top 1%. 
            I also enjoy building passion projects, lifting weights, watching anime, and reading manga. 
            And yes — I’m a proud Shiba Inu owner.
        </p>
    </div>

    <div class="aboutme-item aboutme-links">
        <h2>Let's Connect</h2>
        <p>📧 Email: <a href="mailto:AnilcZorlu@gmail.com">AnilcZorlu@gmail.com</a></p>
        <p>🔗 <a href="https://www.linkedin.com/in/anilcanzorlu/" target="_blank">LinkedIn</a></p>
        <p>💻 <a href="https://github.com/terrific1337?tab=repositories" target="_blank">GitHub</a></p>
    </div>
</div>
@endsection
