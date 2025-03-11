@php
    use App\Models\Menu;
    $menus = Menu::where('level', 0)->get();
    $thresholdId = 10;
@endphp

<nav>
    <ul>
        <li class="first">Anilcan Zorlu</li>

        <div class="menu-center">
            @foreach($menus as $menu)
                @if($menu->id <= $thresholdId)
                    <li>
                        <a href="{{ url(strtolower($menu->name)) }}" class="{{ request()->is(strtolower($menu->name)) ? 'active' : '' }}">
                            {{ $menu->name }}
                        </a>                        
                    </li>
                @endif
            @endforeach
        </div>

        <div class="menu-right">
            @foreach($menus as $menu)
                @if($menu->id > $thresholdId)
                    <li>
                        <a href="{{ url(strtolower($menu->name)) }}" class="{{ request()->is(strtolower($menu->name)) ? 'active' : '' }}">
                            {{ $menu->name }}
                        </a>
                    </li>
                @endif
            @endforeach
        </div>
    </ul>
</nav>
