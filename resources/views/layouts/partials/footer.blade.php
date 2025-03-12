@php
    use App\Models\Menu;
    $menus = Menu::where('level', 0)->get();
@endphp
<div class="footer-separator"></div>
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-grid">

            <!-- About / Branding -->
            <div class="footer-section">
                <h3 class="footer-title">Anilcan Zorlu</h3>
                <p class="footer-description">
                    Passionate software developer with a focus on creating innovative solutions and a commitment to continuous learning and improvement.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3 class="footer-title">Quick Links</h3>
                <ul class="footer-links">
                    @foreach($menus as $menu)
                        @if($menu)
                            <li>
                                <a href="{{ url(strtolower($menu->name)) }}" class="{{ request()->is(strtolower($menu->name)) ? 'active' : '' }}">
                                    {{ $menu->name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- Social Media / Contact Info -->
            <div class="footer-section">
                <h3 class="footer-title">Connect</h3>
                <ul class="footer-links">
                    <li>Email: <a href="mailto:anilczorlu@gmail.com">AnilcZorlu@gmail.com</a></li>
                    <li><a href="https://github.com/terrific1337" target="_blank">GitHub</a></li>
                    <li><a href="https://www.linkedin.com/in/anilcanzorlu/" target="_blank">LinkedIn</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            © {{ date('Y') }} Anilcan Zorlu. All rights reserved.
        </div>
    </div>
</footer>
