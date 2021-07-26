<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/main.js')}}" defer></script>
    <script src="{{asset('ckeditor5/build/ckeditor.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/my-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ckeditor.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
<div class="welcome__main__container">
    <div class="nav__container">

         {{ $header ??''}}
    </div>
    <div class="news__container">
          {{$slot}}
    </div>
</div>

</body>
</html>
