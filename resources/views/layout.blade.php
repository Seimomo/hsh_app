<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="Keywords" content="ホームページ,無料 ,マッチング,ホームページ依頼,ポートフォリオ" />
    <meta name="description" content="無料でホームページを作成したい人とホームページ作成スキルを向上させたい人のマッチングサイトです。">
    <title>Homepage Skill Helper</title>
    <link rel="shortcut icon" href="{{ secure_asset('/img/common/logo_man.png') }}" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
    <script src="{{ secure_asset('/js/delighters.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ secure_asset('/css/marketing.css') }}">
    
    <!--app-->
    <link rel="stylesheet" href="{{ secure_asset('/css/hsh_top.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('/css/hsh_app.css') }}">
</head>
    <body>
        @yield('content')
    </body>
    <footer class="footer l-box is-center">
        Copyright © 2019 Homepage Skill Helper All Rights Reserved.
        
        <a href="{{ url('/contact') }}"><i class="fa fa-envelope-o"></i>問合せ</a>
    </footer>
</html>
