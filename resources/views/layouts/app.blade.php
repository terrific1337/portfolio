<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.html-head')
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>
<script>
    window.onload = function () {
        const loader = document.getElementById('page-loader');
        const dots = document.getElementById('dots');

        let dotCount = 0;
        const dotInterval = setInterval(() => {
            dotCount = (dotCount + 1) % 4;
            dots.textContent = '.'.repeat(dotCount);
        }, 50); // ⏱ faster dots every 200ms

        // Hide loader after initial page load
        setTimeout(() => {
            loader.classList.add('hidden');
            clearInterval(dotInterval);
        }, 100); // ⏱ much quicker fade out after page load

        // Show loader when navigating away
        const links = document.querySelectorAll('a[href]:not([target="_blank"]):not([href^="#"])');
        links.forEach(link => {
            link.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href && !href.startsWith('javascript:')) {
                    e.preventDefault();
                    loader.classList.remove('hidden');

                    let linkDotCount = 0;
                    const linkDotInterval = setInterval(() => {
                        linkDotCount = (linkDotCount + 1) % 4;
                        dots.textContent = '.'.repeat(linkDotCount);
                    }, 50); // ⏱ faster link dot animation

                    setTimeout(() => {
                        clearInterval(linkDotInterval);
                        window.location.href = href;
                    }, 100); // ⏱ faster transition time
                }
            });
        });
    };
</script>

<body>
    <!-- Page Loading Overlay -->
    <div id="page-loader">
        <div class="loading-text">Loading<span id="dots"></span></div>
    </div>


    @include('layouts.partials.menu-topnav')

    <div class="main-wrapper">
        @yield('content') 
    </div>

    @include('layouts.partials.footer')
</body>
</html>
