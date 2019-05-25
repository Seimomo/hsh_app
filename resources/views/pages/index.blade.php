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
            <a href="{{ route('register') }}" class="pure-button-small pure-button pure-button-primary top-button">会員登録する</a>
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
                    <span class="line_marker_yellow_narrow3">「登録から検収まで」より依頼するホームページの内容と<br>希望納期を登録します。
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
                    <span class="line_marker_yellow_narrow3">「登録から検収まで」の「応募者一覧」より作成者を決定します。
                    <br>決めるにあたり応募者のポートフォリオもご覧いただけます。</span>
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 req" data-delighter="start:0.25">
                <h3 class="content-subhead">
                    <i class="fa fa-check-square-o"></i>
                    検収と評価
                </h3>
                <p>
                    <span class="line_marker_yellow_narrow3">「登録から検収まで」で「納品完了」になったら検収します。<br>OKであれば検収完了にします。</span>
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
                    <span class="line_marker_lightpink_narrow3">まずは会員登録(無料)します。</span><br>自己PR欄も登録しておくとよいです。

                </p>
            </div>

            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 cre" data-delighter="start:0.75">

                <h3 class="content-subhead">
                    <i class="fa fa-check-square-o"></i>
                    応募
                </h3>
                <p>
                    <span class="line_marker_lightpink_narrow3">「仕事を探す」から、応募します。<br>「応募から納品まで」に表示されます。</span>
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 cre" data-delighter="start:0.50">
                <h3 class="content-subhead">
                    <i class="fa fa-envelope-o"></i>
                    作成
                </h3>
                <p>
                    <span class="line_marker_lightpink_narrow3">「応募から納品まで」が「契約中」になったら作成します。</span>
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4 cre" data-delighter="start:0.25">
                <h3 class="content-subhead">
                    <i class="fa fa-laptop"></i>
                    納品
                </h3>
                <p>
                    <span class="line_marker_lightpink_narrow3">ホームページを納品します。「検収完了」になれば完了です。<br>「ポートフォリオ編集」で作成内容や使用スキルを登録します。</span>
                </p>
            </div>

        </div>
    </div>
    
    <div class="content">
        
        <div class="pure-g">
            <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                <h2 class="content-head is-center">利用上の注意点</h2>
                <div class="user_rule">
                	<h4>重要な点を抜粋します。詳細は<a href="/rule">こちら</a>をご覧ください。</h4>
                    <ul>
                        <li>依頼できるホームページは<span class="bold red">１つのみです。</span>検収完了後、再度依頼できます。</li>
                        <li>個人の使用を想定しております。<span class="bold">法人でのご利用はご遠慮ください。</span></li>
                        <li>納品物の授受はサイト、github等を使用して当事者間でやりとりお願いします。本サイトでは<span class="bold">メッセージのファイル授受はできません。</span></li>
                        <li>依頼者と作成者間でのトラブル（納期遅延・音信不通など）は<span class="bold">当事者間で解決</span>お願いします。</li>
                    </ul>
                </div>
            </div>

            <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
            <h2 class="content-head is-center">メリット</h2>
                <ul class="requester_merit">
                    <h4>無料でホームページが作成可能！</h4>
                    <li><i class="fa fa-frown-o"></i>プロが作った高額なホームページはいらない。</li>
                    <li><i class="fa fa-frown-o"></i>アマチュア、初心者が勉強用に作ったものでいい。</li>
                    <li><i class="fa fa-arrow-right"></i>ホームーページが無料で作成できるサイトです。</li>
                </ul>
                <ul class="creator_merit">
                    <h4>作成したホームページをポートフォリオに！</h4>
                    <li><i class="fa fa-frown-o"></i>ポートフォリオが作りたいけれど、題材が考えられない。</li>
                    <li><i class="fa fa-frown-o"></i>ポートフォリオをアピールできる場所がない。</li>
                    <li><i class="fa fa-arrow-right"></i>作成したホームページの情報が、一覧で掲載されます。</li>
                </ul>
            </div>
        </div>

    </div>

    <!--<div class="footer l-box is-center">-->
    <!--    Copyright © 2019 Homepage Skill Helper All Rights Reserved.-->
    <!--</div>-->

</div>
@endsection