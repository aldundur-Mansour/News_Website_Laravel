<x-app-layout>

    <x-slot name="header">
        @auth
            @include('components.nav-link-admin-page')
        @else
            @include('components.nav-link-landing-page')
        @endauth
    </x-slot>


    <div>
        @auth
            <div class="my__main__button"><a href="{{ route('posts.create') }}"> ADD NEWS </a></div>
        @endauth
        <div class="my__main__button"> Advance Search filters here</div>

    </div>

    <div class="news__container__content">
        @foreach ($posts as $post)
            <div class="public__news__card__container">
                <div class="public__news__card__content">
                    <div class="public__news__card__title">
                        <span>TITLE </span> {{ $post->title }}
                        <hr>
                    </div>
                    <div class="public__news__card__ckeditor ck-content">
                        {!! $post->content  !!}
                    </div>
                    <div class="admin__news__actions_container">
                        <div x-data="{ open: false }">
                            <button @click="open = ! open" class="my__main__button">Comments({{$post->comments->count()}})</button>
                            <div x-show="open">
                                @foreach ($post->comments as $comment)
                                    <li>
                                        {{$comment->content}}
                                    </li>
                                @endforeach
                            </div>
                        </div>
                        <div>
                        @auth
                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="actoins__form">
                                <a class="my__warning__button" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="my__danger__button">Delete</button>
                            </form>
                        @endauth
                        </div>
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
                    </div>
                    <div>
                        <a href="{{ route('posts.show',$post->id) }}">
                            <button class="my__main__button"> EXPAND</button>
                        </a>
                    </div>
                </div>
            </div>



        @endforeach
    </div>


</x-app-layout>
