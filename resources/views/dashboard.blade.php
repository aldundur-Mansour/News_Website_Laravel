<x-app-layout>
    <x-slot name="header">
        @include('components.nav-link-admin-page')
    </x-slot>

    <div class="dashboard__title">
        <div style="width:9em"> <x-application-logo/></div>
        <h5 style="margin-left: auto;"> WELCOME BACK [ {{Auth::user()->name}} ]</h5>
    </div>
    <div class="dashboard__content">
        <div class="charts__container">
            <div class="number__of__total__news">
                <h2> TOTAL NUMBER OF NEWS</h2>
                <h1> {{ $posts->count()}}</h1>
            </div>


            <div> Number of visitors for each news
{{--                {{ $posts->map(function($post){return $post->id . ":" .$post->views ; }) }}--}}
            </div>
            <div class="hidden__shown__chart">
                <h4>Shown And Hidden Comments</h4>
                <canvas id="myChart"></canvas>
            </div>

            <div class="hidden__shown__chart">
                {{--                     <div class="news__per__category_content">--}}
                {{--                         @foreach($categories as $categorie)--}}
                {{--                             <div class="category__card__float">--}}
                {{--                                 <div class="news__per__category__name"> {{$categorie->name}}</div>--}}
                {{--                                 <div class="news__per__category__posts"> {{$categorie->posts->count()}}</div>--}}
                {{--                             </div>--}}
                {{--                         @endforeach--}}

                {{--                     </div>--}}

                <h4>Number of News Per Category</h4>
                <canvas id="news__per__category__chart"></canvas>

            </div>

        </div>
        <div class="pending__comments__container">
            <h1>PENDING COMMENTS</h1>
            @foreach($comments->where('is_approved',false) as $comment)
                <div class="public__news__card__container">
                    <div class="comments__content__tobe__approved">
                        {{$comment->content}}
                    </div>
                    <div class="approval__form">
                        <form action="{{route('comments.update',$comment->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input value="1" name="is_approved" hidden/>
                            <button class="my__main__button " type="submit">
                                <span class="vertical__writing">APPROVE</span>
                            </button>
                        </form>
                        <button class="my__warning__button">
                            <a class=" vertical__writing" href="{{route('posts.show',$comment->post->id)}}">Post</a>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Shown Comments', 'Hidden Comments'],
                datasets: [{
                    label: 'hidden shown comments',
                    data: [{{$comments->where('is_shown',true)->count()}}, {{$comments->where('is_shown',false)->count()}}],
                    backgroundColor: [
                        'rgb(4,95,208)',
                        'rgb(26,26,26)'
                       ,
                    ],
                    borderColor: [

                    ],
                    borderWidth: 0
                }]
            }
        });

        var ctx2 = document.getElementById('news__per__category__chart').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: {!!  $categories->map(function($category){return $category->name;}) !!},
                datasets: [{
                    label: '',
                    data: {!! $categories->map(function($category){return $category->posts->count();})!!},
                    backgroundColor: [
                        'rgba(31,127,201,0.2)',
                        'rgba(48,44,180,0.87)',
                        'rgb(123,19,121)',
                        'rgb(19,39,52)',
                        'rgb(95,175,175)',
                        'rgb(206,112,139)',
                        'rgb(91,113,151)',
                        'rgb(37,90,92)',
                        'rgb(144,126,83)',
                        'rgb(26,26,26)'
                    ],
                    borderColor: [

                    ],
                    borderWidth: 0
                }]
            }
        });
    </script>
</x-app-layout>
