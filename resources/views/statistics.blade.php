<x-app-layout>
<x-slot name="header">
    @include('components.nav-link-admin-page')
</x-slot>



    <div class="dashboard__title">
    <h1 style="margin:auto;">  STATISTICS </h1>
    </div>

    <div >
{{--      stats__card__container  --}}
        <table class="table" >
{{--    table__header full__dimensions        --}}
            <thead class=" ">
{{--       table__titles full__dimensions     --}}
            <tr class=" table__titles ">
                <th> ID </th>
                <th> TITLE</th>
                <th> CATEGORY </th>
                <th> CREATED AT </th>
                <th> MODIFIED AT </th>
                <th> VIEWS </th>
                <th> #COMMENTS </th>
            </tr>
            </thead>
            <tbody >

    @foreach($posts as $post)
         <tr class="">
             <td>
                 {{ $post->id }}
             </td>
            <td>
                {{ $post->title }}
            </td>
             <td>
                 {{ $post->category->name }}
             </td>
             <td>
                 {{ $post->created_at }}
             </td>
             <td>
                 {{ $post->updated_at }}
             </td>
             <td>
                 {{ $post->views }}
             </td>
             <td>
                 {{ $post->comments->count() }}
             </td>
         </tr>
    @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
