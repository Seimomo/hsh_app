<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading logo_area" href="/">
	        <img width="50" alt="logo" class="pure-img-responsive logo" src="{{ secure_asset('/img/common/logo_man.jpg') }}">
	        <p class="logo_text"><span>Homepage Skill Helper</span><br>ホームページ無料作成のマッチングサイト</p>
        </a>

        <ul class="pure-menu-list">



            @if (auth()->check())
                <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                    <a href="#" id="menuLink1" class="pure-menu-link">マイページ</a>
                    <ul class="pure-menu-children">
                        <li class="pure-menu-item"><a href="{{ url('/profile') }}" class="pure-menu-link">プロフィール編集</a></li>
                        <li class="pure-menu-item"><a href="/avatar" class="pure-menu-link">プロフィール画像編集</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link">ポートフォリオ編集</a></li>
                        <li class="pure-menu-item">
                            <a class="pure-menu-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            @else
                <li class="pure-menu-item">
                    <a class="pure-menu-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                </li>
                    @if (Route::has('register'))
                        <li class="pure-menu-item">
                            <a class="pure-menu-link" href="{{ route('register') }}">{{ __('会員登録') }}</a>
                        </li>
                    @endif
            @endif
            <li class="pure-menu-item"><a class="pure-menu-link" href="/list">依頼一覧</a></li>
            <li class="pure-menu-item"><a class="pure-menu-link" href="/jobs">依頼内容登録</a></li>
            <li class="pure-menu-item"><a class="pure-menu-link" href="{{ url('/subscribes') }}">応募先一覧</a></li>

        </ul>
    </div>
</div>