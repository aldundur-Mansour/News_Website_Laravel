<x-app-layout>
    <x-slot name="header">
        @include('components.nav-link-admin-page')
    </x-slot>

    <div class="news__container__Header">
        <x-application-logo/>
    </div>

    <div class="news__container__content">
        <div class="news__welcome__split">
            @foreach($messages as $message)

                    <div class="public__news__card__container">
                        <div class="public__news__card__content">
                            <div class="public__news__card__title">
                                <span>Name </span> {{ $message->name }} <br>
                                <span> RECEIVED: {{ $message->created_at->format('d/m/Y') }} | </span>
                                <span >SENDER EMAIL:</span>
                                <span > {{ $message->email }}</span>
                                <hr>
                            </div>
                            <div class="public__news__card__ckeditor">
                                {!! $message->content  !!}
                            </div>
                        </div>
                        <div class="public__news__card__meta" >
                            <div class="public__news__card__meta__info">

                                <p class="public__news__card__meta__info__title">MOBILE</p>
                                <p> {{ $message->mobile }}</p>
                                <p class="public__news__card__meta__info__title">RECEIVED</p>
                                <p > {{ $message->created_at->diffForHumans() }}</p>
                            </div>

                        </div>
                    </div>


            @endforeach
        </div>

    </div>


</x-app-layout>
