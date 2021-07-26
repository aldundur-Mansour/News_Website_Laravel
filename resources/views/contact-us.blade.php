<x-app-layout>

    <x-slot name="header">
        @include('components.nav-link-landing-page')
    </x-slot>

<div class="full__dimensions" style="background-color:#1A1A1A ;color:white; display: grid; place-content: center;">
      YOU CAN REACH US ON info@jreedah.com.sa       </div>


    <div class="public__news__card__container" style="margin-top:2.6em;">
        <div class="full__dimensions" style="padding:2.6em;" >

            <form  method="post" action="{{route('contactus.post')}}">

                @csrf
                <h4> NAME</h4>
                <input type="text" name="name" class="my__input__text__field"/>
                <h4>  EMAIL</h4>
                <input type="text" name="email" class="my__input__text__field"/>
                <h4>  MOBILE </h4>
                <input name="mobile" class="my__input__text__field" type="tel"/>
                <h4>  CONTENT </h4>
                <input type="text" name="content" class="my__input__text__field"/>
                <button class="my__main__button">SEND</button>
            </form>
        </div>
        <div class="full__dimensions vertical__writing" style="background-color:#1A1A1A; color:white;">
            <div style="width:30em"> <x-application-logo/></div>
        </div>

    </div>

</x-app-layout>
