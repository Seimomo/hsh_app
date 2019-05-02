@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    <h3 class="content-subhead">会員登録完了</h3>
        <div class="pure-g">
            <div class="pure-u-1">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                ログインできました！
                <p><a href="/list" class="pure-button pure-button-primary">依頼一覧を見る</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
