<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Behzi</title>
    <style>
        @font-face {
            font-family: 'IRANSansWeb';
            src: url('/fonts/iransans.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
    <link rel="stylesheet" href="/css/capp.css">
</head>
<body>
    @include('front.customer-template.layouts.header')
    @yield('content')
{{--Js scripts--}}
    <script src="/js/app.js"></script>
</body>
</html>