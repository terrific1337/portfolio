@extends('layouts.app')

@section('content')
  <header>
      <h1>Hey, I'm <span class="homename">Anilcan</span></h1>
      <p class="hero-subtitle">
          <span id="typing-text"></span><span id="cursor">|</span>
      </p>
      
      <div class="cta-buttons">
          <a href="/projects">View Projects</a>
          <a href="/contact">Contact Me</a>
      </div>
  </header>

  <section class="intro-section">
      <p>
          Welcome to my portfolio! I'm a Software Developer who loves creating clean, functional websites and apps. Currently working with Laravel, PHP, MySQL, and CSS.
      </p>
      <p>
          I enjoy both backend and frontend development. Check out my work or get in touch to collaborate!
      </p>
  </section>
@endsection
