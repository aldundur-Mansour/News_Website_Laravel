<div class="nav__container__navigations">
    <a href="{{ route('contactus') }}" >CONTACT US </a>
    <a href="{{ route('aboutus') }}" > ABOUT US </a>
    <a href="{{ url('/') }}" > HOME</a>
</div>
<div class="nav__container__Auth">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}">
                <img src="{{asset('assets/user.svg')}}"/>
            </a>
        @else
            <a href="{{ route('login') }}">
                <img  src="{{asset('assets/login.svg')}}"/>
            </a>

        @endauth
    @endif
</div>
