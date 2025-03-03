@php
    use App\Models\Menu;
    $menus = Menu::where('level', 0)->get();
@endphp

<nav>
    <ul>
        <li class="first">Anilcan Zorlu</li>

        @foreach($menus as $menu)
            <li>
                <a href="{{ url($menu->name) }}" class={{ request()->is($menu->name) ? 'active' : '' }}>
                    {{ $menu->name }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
