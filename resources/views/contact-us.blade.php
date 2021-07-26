<x-app-layout>

    <x-slot name="header">
        @include('components.nav-link-landing-page')
    </x-slot>

<div class="full__dimensions" style="background-color:#1A1A1A ;color:white; display: grid; place-content: center;">
    Contact Us
</div>


    <div class="public__news__card__container">
        <div class="full__dimensions" style="padding:1em;" >

            <form  method="post" action="{{route('contactus.post')}}">
                @csrf
                <h3> NAME</h3>
                <input type="text" name="name" class="my__input__text__field"/>
                <h3>  EMAIL</h3>
                <input type="text" name="email" class="my__input__text__field"/>
                <h3>  MOBILE </h3>
                <input name="mobile" class="my__input__text__field" type="tel"/>
                <h3>  CONTENT </h3>
                <input type="text" name="content" class="my__input__text__field"/>
                <button class="my__main__button">SEND</button>
            </form>
        </div>
        <div class="full__dimensions vertical__writing" style="background-color:#1A1A1A; color:white;">  </div>

    </div>

</x-app-layout>
