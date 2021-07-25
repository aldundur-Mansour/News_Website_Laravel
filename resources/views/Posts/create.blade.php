<x-app-layout>

<form action="{{ route("posts.store" ) }}" method="post">
    @csrf
    <input type="text" name="title"/>
    <input type="number" name="category_id"/>
    <input type="number" name="user_id"/>
    <textarea class="editor" name="content"></textarea>
    <button type="submit"> Save</button>
</form>
</x-app-layout>
