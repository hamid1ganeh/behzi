<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    @include('front.includes.font-intro')
    <style>
        .holder{
            background-image: url('/images/static/404.svg');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: end;
            margin-top: -3rem;
        }
        .holder #you-lost{
            margin-bottom: 20px;
            font-size: 20px;
            text-shadow: 0 0 3px #7395ff;
        }
        .holder a{
            background-color: #00e4cd; color: white; border-radius: 7px; padding:6px 15px; text-decoration: none
        }
    </style>
</head>
<body bgcolor="7395ff" style="padding: 0 280px 0 280px">
    <div class="holder">
        <div style="font-family: Vazir;margin-bottom: 3.5rem;color:white;text-align: center">
            <div id="you-lost">!به نظر شما گمشده اید</div>
            <a href="/">بازگشت به سایت</a>
        </div>
    </div>
</body>
</html>
