@php
    use App\Models\Menu;
    use Illuminate\Support\Facades\Auth;

    // Determine which menus to show
    if (Auth::check()) {
        $userLevel = Auth::user()->level;
        $menus = Menu::whereIn('level', [0, ($userLevel === 5 ? 5 : null)])->get();
    } else {
        $menus = Menu::where('level', 0)->get();
    }

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
                        <a href="{{ url(strtolower($menu->name)) }}" class="{{ request()->is(strtolower($menu->name) . '*') ? 'active' : '' }}">
                            {{ $menu->name }}
                        </a>
                    </li>
                @endif
            @endforeach

            @if (Auth::check())
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">
                        Login
                    </a>
                </li>
            @endif
        </div>
    </ul>
</nav>
