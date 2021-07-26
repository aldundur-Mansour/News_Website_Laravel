<div class="nav__container__navigations">


    <div class="full__dimensions" >
        <form class="full__dimensions" method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="full__dimensions" href="route('logout')"
               onclick="event.preventDefault();
                                        this.closest('form').submit();"> LOGOUT </a>
        </form>
    </div>
    <div class="full__dimensions" >

        <a href="{{ url('/') }}" >  HOME </a>

    </div>
    <div class="full__dimensions" >

        <a href="{{ route('posts.index') }}" >  MANAGE NEWS</a>

    </div>

</div>
<div class="nav__container__Auth">

    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}">
                <img  src="{{asset('assets/user.svg')}}"/>
            </a>
        @else
            <a href="{{ route('login') }}">
                <img  src="{{asset('assets/login.svg')}}"/>
            </a>


        @endauth
    @endif
</div>
