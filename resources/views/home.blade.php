@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    
    <h3 class="content-subhead">完了しました</h3>
        <div class="pure-g">
            <div class="pure-u-1">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <p><a class="pure-button pure-button-primary" href="{{ url('/list') }}"><i class="fa fa-laptop"></i>仕事を探す</a></p>
                <p><a class="pure-button pure-button-primary" href="{{ url('/jobs') }}">仕事を登録する</a></p>
                <p><a class="pure-button pure-button-primary" href="{{ url('/portfolios') }}"><i class="fa fa-user"></i>作成者を探す</a></p>
            </div>
        </div>

</div>
@endsection
