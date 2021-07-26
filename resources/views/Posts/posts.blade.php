<x-app-layout>
    <x-application-logo />
    <x-slot name="header">
    @auth
            @include('components.nav-link-admin-page')
        @else
            @include('components.nav-link-landing-page')
        @endauth
    </x-slot>

    <div>
        @auth

            <a href="{{ route('posts.create') }}">  <button class="my__main__button"> ADD NEWS </button></a>
        @endauth
            <div x-data="{ open: false }"  class="full__dimensions">

                <button @click="open =!open" class="my__main__button">PRESS HERE TO SEARCH OR SCROLL TO BROWSE</button>
        <form action="{{route('posts.index')}}" method="GET" style="position: absolute; z-index: 45; width: 95vw;">
             <div x-show="open">
                    <input name="search"  class="my__input__text__field" value="{{request('search')}}"/>
                 <button class="my__warning__button">SEARCH</button>
             </div>

        </form>
            </div>

    </div>
    <div class="news__container__content">
        @foreach ($posts as $post)
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
                    <div class="admin__news__actions_container">
                        <div x-data="{ open: false }">
                            <button @click="open = ! open" class="my__main__button">Comments({{$post->comments->where('is_approved',true)->where('is_shown',true) ->count()}})</button>
                            <div x-show="open">
                                @foreach ($post->comments->where('is_approved',true)->where('is_shown',true) as $comment)
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
                        <p class="public__news__card__meta__info__title">AUTHOR</p>
                        <p> {{ $post->author->name }}</p>
                        <p class="public__news__card__meta__info__title">CATEGORY</p>
                        <p> {{ $post->category->name }}</p>
                        <p class="public__news__card__meta__info__title">PUBLISHED</p>
                        <p > {{ $post->created_at->diffForHumans() }}</p>

                        <p class="public__news__card__meta__info__title">NUMBER OF VIEWS</p>
                        <p> {{ $post->views }}</p>

                    </div>
                    <div>
                        <a href="{{ route('posts.show',$post->id) }}">
                            <button class="my__main__button"> EXPAND</button>
                        </a>
                    </div>
                </div>
            </div>



        @endforeach
         <div class="pagination__number__container">{{$posts->links()}}</div>
    </div>


</x-app-layout>
