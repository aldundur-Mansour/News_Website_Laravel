<x-app-layout>
    <x-slot name="header">
        @include('components.nav-link-landing-page')
    </x-slot>

        <div class="news__container__Header">
            <x-application-logo/>
        </div>

        <div class="news__container__content">
            <div class="news__welcome__split">
            @foreach($posts as $post)
                @if ($loop->iteration <= 10)
                    <div class="public__news__card__container">
                        <div class="public__news__card__content">
                            <div class="public__news__card__title">
                                <span>TITLE </span> {{ $post->title }} <br>
                                <span> PUBLISHED AT {{ $post->created_at->format('d/m/Y') }}</span>
                                <hr>
                            </div>
                            <div class="public__news__card__ckeditor ck-content">
                                {!! $post->content  !!}
                            </div>
                        </div>
                        <div class="public__news__card__meta">
                            <div class="public__news__card__meta__info">
                                <p class="public__news__card__meta__info__title">AUTHOR</p>
                                <p> {{ $post->author->name }}</p>
                                <p class="public__news__card__meta__info__title">CATEGORY</p>
                                <p> {{ $post->category->name }}</p>
                                <p class="public__news__card__meta__info__title">PUBLISHED</p>
                                <p > {{ $post->created_at->diffForHumans() }}</p>
                                <p class="public__news__card__meta__info__title">COMMENTS</p>
                                <p> {{ $post->comments->where('is_approved',true)->where('is_shown',true)->count() }}</p>
                                <p class="public__news__card__meta__info__title">NUMBER OF VIEWS</p>
                                <p> {{ $post->views }}</p>
                            </div>
                            <div>
                                <a href="{{ route('posts.show',$post->id) }}">
                                <button class="my__main__button" > EXPAND </button>
                                    </a>
                            </div>
                        </div>
                    </div>
                @else
                    @break
                @endif
            @endforeach
            </div>
            <a href="{{ route('posts.index') }}">
                <button class="my__main__button"> Browse All News</button>
            </a>
        </div>
</x-app-layout>

