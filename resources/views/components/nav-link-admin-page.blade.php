<div class="nav__container__navigations">
    <a href="{{ route('posts.index') }}" >MANAGE NEWS</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="route('logout')"
           onclick="event.preventDefault();
                                        this.closest('form').submit();"> LOGOUT </a>
    </form>
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
