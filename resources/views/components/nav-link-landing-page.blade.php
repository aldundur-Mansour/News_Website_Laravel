<div class="nav__container__navigations">
    <a href="{{ url('/contact-us') }}" >CONTACT US </a>
    <a href="{{ url('/about-us') }}" > ABOUT US </a>
</div>
<div class="nav__container__Auth">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}">
                <img  src="{{asset('assets/user.svg')}}"/>
            </a>
        @else
            <a href="{{ route('login') }}">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    @endif
</div>
