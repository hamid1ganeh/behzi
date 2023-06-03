<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}
    @include('.front.includes.font-intro')
    <link rel="icon" href="{{ url('cp/assets/media/logos/favicon.ico') }}" type="image/ico">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {!! \MadWeb\Robots\RobotsFacade::metaTag() !!}
    @stack('css')
</head>

<body class="bg-white">
<div id="app">
    @yield('content')
    <behzi-alert></behzi-alert>
</div>

@include('front.layouts.footer')

{{--Js scripts--}}
<script>
    window.Laravel = {};
    window.url = '{{ url('/') }}';
    window.Laravel.Auth = '{{ Auth::check() }}' == '' ? false : true;
    window.Laravel.csrfToken = '{{ csrf_token() }}';
</script>
<script src="{{ asset('js/dependencies/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/dependencies/popper.min.js') }}"></script>
<script src="{{ asset('js/dependencies/bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/lazyload.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom-script.js') }}"></script>
@stack('js')
{{--***--}}

@yield('custom-js')

</body>

</html>