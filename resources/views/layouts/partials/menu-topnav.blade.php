@php
    use App\Models\Menu;
    $menus = Menu::where('level', 0)->get(); // Fetch only menu items where role_level = 0
@endphp

<nav>
    <ul>
        @foreach($menus as $menu)
            <li>
                <a href="{{ url($menu->name) }}" class={{ request()->is($menu->name) ? 'active' : '' }}>{{ $menu->name }}</a>
            </li>
        @endforeach
    </ul>
</nav>
