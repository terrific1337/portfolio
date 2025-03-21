<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.html-head')
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>

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

    <!-- Move all your scripts here in this section -->
    <script>
        window.onload = function () {
            const loader = document.getElementById('page-loader');
            const dots = document.getElementById('dots');

            let dotCount = 0;
            const dotInterval = setInterval(() => {
                dotCount = (dotCount + 1) % 4;
                dots.textContent = '.'.repeat(dotCount);
            }, 50); // ⏱ faster dots every 50ms

            // Hide loader after initial page load
            setTimeout(() => {
                loader.classList.add('hidden');
                clearInterval(dotInterval);
            }, 100); // ⏱ quick fade-out after page load

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

    <script>
        const phrases = [
            "Software Developer",
            "Laravel Developer",
            "Fullstack Builder",
            "Frontend Enthusiast"
        ];

        const typingText = document.getElementById("typing-text");
        const cursor = document.getElementById("cursor");

        let phraseIndex = 0;
        let charIndex = 0;
        let typingSpeed = 80;
        let erasingSpeed = 40;
        let delayBetweenPhrases = 1500;

        function type() {
            if (charIndex < phrases[phraseIndex].length) {
                typingText.textContent += phrases[phraseIndex].charAt(charIndex);
                charIndex++;
                setTimeout(type, typingSpeed);
            } else {
                setTimeout(erase, delayBetweenPhrases);
            }
        }

        function erase() {
            if (charIndex > 0) {
                typingText.textContent = phrases[phraseIndex].substring(0, charIndex - 1);
                charIndex--;
                setTimeout(erase, erasingSpeed);
            } else {
                phraseIndex = (phraseIndex + 1) % phrases.length;
                setTimeout(type, 500);
            }
        }

        // Blinking cursor effect
        setInterval(() => {
            cursor.style.opacity = cursor.style.opacity === "0" ? "1" : "0";
        }, 400);

        // Start on load
        window.addEventListener("load", () => {
            setTimeout(type, 500);
        });
    </script>
</body>
</html>
