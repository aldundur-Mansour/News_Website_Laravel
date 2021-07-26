<x-app-layout>


    <x-slot name="header">
        <div class="edit__actions__nav">
            <button class="my__main__button" style="height: 100% "
                    onclick="event.preventDefault(); document.getElementById('edit_form').submit();">
                <span class="vertical__writing"> SUBMIT </span>
            </button>
            <button class="my__danger__button vertical__writing" style="height: 100% ">
                <a class="vertical__writing" href="{{route('posts.index')}}">CANCEL </a>
            </button>
        </div>
    </x-slot>

    <div class="edit__form__container public__news__card__container">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" id="edit_form">
            @csrf
            @method('PUT')
            <h3 style="color:#9e39e8">EDIT THE TITLE</h3>
            <input type="text" name="title" value="{{ $post->title }}" class="my__input__text__field"/>
            <h3 style="color:#9e39e8">CHOOSE A CATEGORY</h3>
            <select name="category_id" class="my__input__text__field">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                @endforeach
            </select>
            <h3 style="margin-bottom:  1em ; color:#9e39e8">EDIT THE CONTENT </h3>
            <textarea class="editor" style="height:50px" name="content">{{ $post->content }}</textarea>
            <input type="number" name="user_id" value="{{Auth::user()->id}}" hidden>
        </form>
    </div>
</x-app-layout>
