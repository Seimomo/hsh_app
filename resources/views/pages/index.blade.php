@extends('layout')
@section('content')
@include('navbar')

<div class="splash-container">
    <div class="splash">
        <div class="splash-head"><img width="auto" alt="logo" class="pure-img-responsive top_img" src="{{ secure_asset('/img/top_center.png') }}"></div>
        <p class="splash-subhead">
           Homepage Skill Helperは<br>無料でホームページを作成したい人と<br>ホームページ作成スキルを向上させたい人のマッチングサイトです。
        </p>
        <p>
            <a href="{{ route('login') }}" class="pure-button-small pure-button pure-button-primary top-button">ログインする</a>
        </p>

    </div>
    
</div>

<div class="content-wrapper">
    <div class="content">
        <h2 class="content-head is-center requester-step">
            <img width="30" alt="requester" class="pure-img-responsive requester" src="{{ secure_asset('/img/requester.jpg') }}">
            <span>ホームページ作成 依頼の流れ</span>
        </h2>

        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 req" data-delighter="start:0.99">

                <h3 class="content-subhead">
                    <i class="fa fa-user"></i>
                    会員登録
                </h3>
                <p>
                    <span class="line_marker_yellow_narrow3">まずは会員登録(無料)します。</span>
                </p>
            </div>

            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 req" data-delighter="start:0.75">

                <h3 class="content-subhead">
                    <i class="fa fa-laptop"></i>
                    依頼内容の登録
                </h3>
                <p>
                    <span class="line_marker_yellow_narrow3">依頼するホームページの内容と<br>希望納期を登録します。
                        <br><span class="red">※ホームページを掲載するサーバは<br>あらかじめご用意ください。</span>
                    </span>
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 req" data-delighter="start:0.50">
                <h3 class="content-subhead">
                    <i class="fa fa-envelope-o"></i>
                    作成者に依頼
                </h3>
                <p>
                    <span class="line_marker_yellow_narrow3">応募者の中から作成者を決め、メールで依頼します。</span>
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 req" data-delighter="start:0.25">
                <h3 class="content-subhead">
                    <i class="fa fa-check-square-o"></i>
                    検収と評価
                </h3>
                <p>
                    <span class="line_marker_yellow_narrow3">ホームページをチェック。作成者にOKまたは、修正依頼を連絡します。<br>作成者をいいね！で評価します。</span>
                </p>
            </div>

        </div>
    </div>

    <div class="content ribbon">
        <h2 class="content-head content-head-ribbon is-center creator-step">
            <img width="20" alt="requester" class="pure-img-responsive" src="{{ secure_asset('/img/creator.jpg') }}">
            <span>ホームページ作成 応募の流れ</span>
        </h2>

        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 cre" data-delighter="start:0.99">

                <h3 class="content-subhead">
                    <i class="fa fa-user"></i>
                    会員登録
                </h3>
                <p>
                    <span class="line_marker_lightpink_narrow3">まずは会員登録(無料)します。</span><br>保有スキルも登録しておくとよいです。

                </p>
            </div>

            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 cre" data-delighter="start:0.75">

                <h3 class="content-subhead">
                    <i class="fa fa-check-square-o"></i>
                    応募
                </h3>
                <p>
                    <span class="line_marker_lightpink_narrow3">依頼一覧から、応募します。</span>
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 cre" data-delighter="start:0.50">
                <h3 class="content-subhead">
                    <i class="fa fa-envelope-o"></i>
                    作成
                </h3>
                <p>
                    <span class="line_marker_lightpink_narrow3">依頼者からのメールを受け、作成します。</span>
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 cre" data-delighter="start:0.25">
                <h3 class="content-subhead">
                    <i class="fa fa-laptop"></i>
                    納品と評価
                </h3>
                <p>
                    <span class="line_marker_lightpink_narrow3">ホームページを納品します。OKが出れば完了です。<br>依頼者をいいね！で評価します。</span>
                </p>
            </div>

        </div>
    </div>
    
    <div class="content">
        
        <div class="pure-g">
            <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                <h2 class="content-head is-center">利用規約</h2>
                <div class="user_rule">
                	<h4>重要な点を抜粋します。詳細は<a href="#">こちら</a>をご覧ください。</h4>
                    <ul>
                        <li>同じ時期に依頼できるホームページは<span class="red bold">１つのみ</span>です。別の依頼は納品後にお願いします。</li>
                        <li>法人の方はご遠慮ください。</li>
                        <li>依頼者と作成者間でのトラブル（納期遅延・音信不通など）は当事者間で解決お願いします。</li>
                        <li>納品物の授受はサイト、github等を使用して当事者間でやりとりお願いします。本サイトではメッセージのファイル授受はできません。</li>
                    </ul>
                </div>
            </div>

            <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
            <h2 class="content-head is-center">メリット</h2>
                <ul class="requester_merit">
                    <h4>無料でホームページが作成可能！</h4>
                    <li><i class="fa fa-frown-o"></i>プロが作った高額なホームページはいらない。</li>
                    <li><i class="fa fa-frown-o"></i>アマチュア、初心者が勉強用に作ったものでいい。</li>
                    <li><i class="fa fa-arrow-right"></i>ホームーページが無料でホームページ作れるサイトです。</li>
                </ul>
                <ul class="creator_merit">
                    <h4>作成したホームページをポートフォリオに！</h4>
                    <li><i class="fa fa-frown-o"></i>ポートフォリオが作りたいけれど、題材が考えられない。</li>
                    <li><i class="fa fa-frown-o"></i>ポートフォリオをアピールできる場所がない。</li>
                    <li><i class="fa fa-arrow-right"></i>作成したホームページの画像が、ユーザ情報の1つとして掲載されます。</li>
                </ul>
            </div>
        </div>

    </div>

    <div class="footer l-box is-center">
        View the source of this layout to learn more. Made with love by the YUI Team.
    </div>

</div>
@endsection