<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.html-head')
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>
<body>

    {{-- @include('layouts.partials.menu-sidebar') --}}
    @include('layouts.partials.menu-topnav')

    <div class="main-wrapper">
        @yield('content') 
    </div>

    @include('layouts.partials.footer')
</body>
</html>
