<x-app-layout>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
                    <strong>title</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Name">
                    <strong>content</strong>
                    <textarea class="editor" style="height:50px" name="content"
                              placeholder="Introduction">{{ $post->content }}</textarea>
                    <strong>CAtegory:</strong>
                    <input type="text" name="category_id" class="form-control"
                           value="{{ $post->category_id }}">
                    <strong>Author:</strong>
                    <input type="number" name="user_id" class="form-control" placeholder="{{ $post->user_id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</x-app-layout>
