<li class="menu">
    @php $is_active = 0; @endphp
    @foreach ($activeForRouteNames as $activeForRouteName)
        @if(Route::currentRouteName() == $activeForRouteName)
            <a href="{{ route($route) }}" class="dropdown-toggle active">
                <div class="">
                    <i class="{{ $icon }}"></i>
                    <span>{{ $name }}</span>
                </div>
            </a>
            @php $is_active = 1; @endphp
        @endif
    @endforeach
    @if($is_active == 0)
        <a href="{{ route($route) }}" class="dropdown-toggle">
            <div class="">
                <i class="{{ $icon }}"></i>
                <span>{{ $name }}</span>
            </div>
        </a>
    @endif
</li>