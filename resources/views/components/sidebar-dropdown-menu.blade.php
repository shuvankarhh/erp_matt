<li class="menu">
    <a href="#sidebar_menu_{{ $id }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="{{ $id }}_sidebar_menu_button">
        <div class="" style="overflow: unset;">
            <i class="{{ $icon }}"></i>
            <span>{{ $name }}</span>
        </div>
        <div>
            <i class="flaticon-right-arrow"></i>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="sidebar_menu_{{ $id }}">
        @foreach ($routes as $routeName => $submenuDetails)
            @php $is_active = 0; @endphp
            @foreach ($submenuDetails['activeForRouteNames'] as $activeForRouteName)
                @if(Route::currentRouteName() == $activeForRouteName)
                    <li class="active">
                        <a href="{{ route($routeName) }}">{{ $submenuDetails['button_text'] }}</a>
                    </li>
                    <input type="hidden" name="active_sidebar_menu_button" value="{{ $id }}_sidebar_menu_button">
                    @php $is_active = 1; @endphp
                @endif
            @endforeach
            @if($is_active == 0)
                <li class="">
                    <a href="{{ route($routeName) }}">{{ $submenuDetails['button_text'] }}</a>
                </li>
            @endif
        @endforeach
    </ul>
    
</li>