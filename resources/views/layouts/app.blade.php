<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.html-head')
    <title>@yield('title')</title>
</head>
<body>

    @include('layouts.partials.menu-sidebar')
    @include('layouts.partials.menu-topnav')

    <div class="main-wrapper">
        @yield('content') 
        test
    </div>

</body>
</html>
