<x-app-layout>
    <x-slot name="header">
        @auth
            @include('components.nav-link-admin-page')
        @else
            @include('components.nav-link-landing-page')
        @endauth
    </x-slot>

<div class="public__news__card__container" >

    <div class="details__main__container">

        <div  class="details__content">
            <div class="public__news__card__title">
                <span>TITLE </span> {{ $post->title }} <br>
                <span> PUBLISHED AT {{ $post->created_at->format('d/m/Y') }} |</span>
                <span> LAST MODIFIED {{ $post->updated_at->format('d/m/Y') }}</span>
                <hr>
            </div>
            <div class="ck-content">
                {!! $post->content !!}
            </div>


        </div>

        <div  class="details__comments">
<h3>COMMENTS</h3>
            @if ($post->comments->count() > 0)
                @auth
            @foreach($post->comments->where('is_approved',true)->sortByDesc('created_at') as $comment)
                <div class="public__news__card__container" style="width:60%">
                   <div class="{{$comment->is_shown ? "comment__content__shown" : "comment__content__hidden"}}">
                        <div class="full__dimensions"><p> {{$comment->content}}</p> </div>
                       <div class="comment__published_at">{{$comment->created_at->diffForHumans()}}</div>
                   </div>
                    <div class="comment__content__actions">


                            <form  action="{{route('comments.update',$comment->id)}}" method="POST" >
                                @csrf
                                @method('PUT')
                                <input value="1" name="is_approved" hidden/>
                                <input value="{{$comment->is_shown ? "0": "1"}}" name="is_shown" hidden/>
                                <button class="my__main__button" type="submit" style="font-size: 0.8em"> {{$comment->is_shown ? "HIDE": "SHOW"}}</button>
                            </form>

                            <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="my__danger__button" style="font-size: 0.8em">DELETE</button>
                            </form>

                            <div x-data="{ open: false }">
                                <button @click="open = ! open" class="my__warning__button" style="font-size: 0.8em"> EDIT  </button>
                                <div x-show="open">
                                <form action="{{route('comments.update',$comment->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input value="1" name="is_approved" hidden/>
                                <input type="text" name="post_id" value="{{$post->id}}" hidden>
                                <input class="my__input__text__field full__dimensions__enforced " value="{{$comment->content}}" type="text" name="content" />
                                <button type="submit" class="my__warning__button" style="font-size: 0.8em"> DONE </button>
                                </form>
                                </div>

                            </div>

                    </div>
                </div>
            @endforeach
                    @else
                    @foreach($post->comments->where('is_approved',true)->where('is_shown',true)->sortByDesc('created_at') as $comment)
                        <div class="public__news__card__container">
                            <div class="{{$comment->is_shown ? "comment__content__shown" : "comment__content__hidden"}}">
                                <div class="full__dimensions"><p> {{$comment->content}}</p> </div>
                                <div class="comment__published_at">{{$comment->created_at->diffForHumans()}}</div>
                            </div>
                            <div class="comment__content__actions">
                            </div>
                        </div>
                    @endforeach
                @endauth
            @else
                <h3> NO COMMENTS YET ..</h3>
            @endif
            <div x-data="{ open: false }">
                <button @click="open = ! open" class="my__main__button"> ADD A COMMENT  </button>
                <div x-show="open">
                    <form class="adding__a__comment_form" action="{{route('posts.comments.store',$post->id)}}" method="post">
                        @csrf
                        <input type="text" name="post_id" value="{{$post->id}}" hidden>
                        <input class="my__input__text__field" type="text" name="content" />
                        <button type="submit" class="my__warning__button"> Send </button>
                    </form>
                </div>
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






</x-app-layout>
