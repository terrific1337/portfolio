@extends('layouts.app')
@section('content')
@include('layouts.partials.header')
<div class ="skills-container">

    <div class="skills-section">
        <h1>Web Development</h1>
        <div class="skills-grid">
            <div><img src="images/Laravel.png" alt="laravel"><p>Laravel</p></div>
            <div><img src="images/php.png" alt="php"><p>PHP</p></div>
            <div><img src="images/vue.png" alt="Vue.js"><p>Vue.js</p></div>
            <div><img src="images/javascript.png" alt="javascript"><p>JavaScript</p></div>
            <div><img src="images/html.png" alt="html"><p>HTML</p></div>
            <div><img src="images/css.png" alt="css"><p>CSS</p></div>
            <div><img src="images/bug.png" alt="debuging&testing"><p>Debugging & Testing</p></div>
        </div>
    </div>

    <div class="skills-section">
        <h1>Databases & Handling</h1>
        <div class="skills-grid">    
            <div><img src="images/mysql.png" alt="mysql"><p>MySQL</p></div>
            <div><img src="images/phpmyadmin.png" alt="phpMyAdmin"><p>phpMyAdmin</p></div>
            <div><img src="images/powerbi.png" alt="Power BI"><p>Power BI</p></div>
            <div><img src="images/normalization.png" alt="normalization"><p>Database Normalization</p></div>
        </div>
    </div>

    <div class="skills-section">
        <h1>Version Control & Tools</h1>
        <div class="skills-grid">
            <div><img src="images/Git.png" alt="git"><p>Git</p></div>
            <div><img src="images/github.png" alt="github"><p>GitHub</p></div>
            <div><img src="images/gitlab.png" alt="gitlab"><p>GitLab</p></div>
            <div><img src="images/vscode.png" alt="VS Code"><p>VS Code</p></div>
            <div><img src="images/XAMPP.png" alt="xampp"><p>XAMPP</p></div>
        </div>
    </div>

    <div class="skills-section">
        <h1>UI/UX & Design</h1>
        <div class="skills-grid">            
            <div><img src="images/figma.png" alt="figma"><p>Figma</p></div>
            <div><img src="images/xd.png" alt="adobe xd"><p>Adobe XD</p></div>
        </div>
    </div>

    <div class="skills-section">
        <h1>Project Management & Workflow</h1>
        <div class="skills-grid">
            <div><img src="images/trello.png" alt="trello"><p>Trello</p></div>
            <div><img src="images/scrum.png" alt="scrum"><p>Scrum & Agile</p></div>
            <div><img src="images/slack.png"alt="slack"><p>Slack</p></div>
        </div>
    </div>

    <div class="skills-section">
        <h1>Other Skills</h1>
        <div class="skills-grid">    
            <div><img src="images/Microsoft_Office.png" alt="microsoft office"><p>Microsoft Office</p></div>
            <div><img src="images/vegaspro.png" alt="sony vegas pro"><p>Sony Vegas Pro</p></div>
            <div><img src="images/OBS.png" alt="obs"><p>OBS</p></div>
        </div>
    </div>

    <div class="skills-section">
        <h1>What's Next?</h1>
        <div class="skills-grid">
        <div><img src="images/Laravel.png" alt="Laravel"><p>Laravel</p></div>
        <div><img src="images/vue.png" alt="Vue.js"><p>Vue.js</p></div>
        <div><img src="images/api.png" alt="API"><p>API's</p></div>
        </div>
    </div>
</div>
@endsection
