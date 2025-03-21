<aside class="sidebar">
    <div class="sidebar-header">
        <h2>My Panel</h2>
    </div>
    <ul class="sidebar-menu">
        <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
        <li><a href="{{ route('dashboard.aboutme') }}" class="{{ request()->routeIs('dashboard.aboutme') ? 'active' : '' }}">About Me</a></li>
        <li><a href="{{ route('dashboard.projects') }}" class="{{ request()->routeIs('dashboard.projects') ? 'active' : '' }}">Projects</a></li>
        <li><a href="{{ route('dashboard.skills') }}" class="{{ request()->routeIs('dashboard.skills') ? 'active' : '' }}">Skills</a></li>
        <li><a href="{{ route('dashboard.jobs') }}" class="{{ request()->routeIs('dashboard.jobs') ? 'active' : '' }}">Jobs</a></li>
        <li><a href="{{ route('dashboard.testimonials') }}" class="{{ request()->routeIs('dashboard.testimonials') ? 'active' : '' }}">Testimonials</a></li>
        <li><a href="{{ route('dashboard.users') }}" class="{{ request()->routeIs('dashboard.users') ? 'active' : '' }}">Users</a></li>
        <li><a href="{{ route('dashboard.messages') }}" class="{{ request()->routeIs('dashboard.messages') ? 'active' : '' }}">Messages</a></li>
    </ul>
</aside>
