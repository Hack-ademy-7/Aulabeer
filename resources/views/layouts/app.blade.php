<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @stack("style")
    <title>@yield('title')</title>
</head>

<body>
    @include('layouts._nav')
    @if (session("message"))
    <div class="alert alert-success" role="alert">
        {!! session("message") !!}
    </div>
    @endif
    {{--   agujero  --}}
    @yield('content')
    @include('layouts._footer')
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')

</body>

</html>
