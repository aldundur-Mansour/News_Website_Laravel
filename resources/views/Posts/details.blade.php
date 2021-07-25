<x-app-layout>
<p> {{ $post->title }}</p>
<div class="ck-content">
    {!! $post->content !!})
</div>
<p> {{ $post->author->name }}</p>
<p>{{ $post->category->name }}</p>
</x-app-layout>
