<li class="nav-item @if(str_contains(Route::currentRouteName(), 'subscribers')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#contacts" aria-controls="contacts" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-earth-asia mx-2"></i>
        </span>
        <span class="text">{{ __('trans.subscribers') }}</span>
    </a>
    <ul id="contacts" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.subscribers.index') }}">{{ __('trans.viewAll') }}</a></li>
    </ul>
</li>
