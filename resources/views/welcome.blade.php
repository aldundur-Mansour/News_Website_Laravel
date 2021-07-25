<x-app-layout>
    <x-slot name="header">
        @include('components.nav-link-landing-page')
    </x-slot>

        <div class="news__container__Header">
            <p> LATEST NEWS </p>
        </div>
        <div class="news__container__content">
            @foreach($posts as $post)
                @if ($loop->iteration <= 10)
                    <div class="public__news__card__container">
                        <div class="public__news__card__content">
                            <div class="public__news__card__title">
                                <span>TITLE </span> {{ $post->title }}
                                <hr>
                            </div>
                            <div class="public__news__card__ckeditor ck-content">
                                {!! $post->content  !!}
                            </div>
                        </div>
                        <div class="public__news__card__meta">
                            <div class="public__news__card__meta__info">
                                <p>AUTHOR</p>
                                <p> {{ $post->author->name }}</p>
                                <p>CATEGORY</p>
                                <p> {{ $post->category->name }}</p>
                                <p>PUBLISHED</p>
                                <p> {{ $post->created_at->diffForHumans() }}</p>
                                <p>COMMENTS</p>
                                <p> {{ $post->comments->count() }}</p>
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
            <a href="{{ route('posts.index') }}">
                <button class="my__main__button"> Browse All News</button>
            </a>
        </div>
</x-app-layout>

