@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <div class="pure-u-1">
        {{ Form::open(['url' => '/avatar_upload', 'method' => 'post', 'files' => true]) }}
        
        @if ($errors->any())
            <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif
        {{ Form::label('file', 'プロフィール画像アップロード') }}
        <div>
            @if ($user->avatar_path)
                <p>
                    <img src="{{ $user->avatar_path }}"/>
                </p>
            @endif
            
            {{ Form::file('file', ['class' => 'pure-button pure-button-primary']) }}
             <p>画像ファイル（JPG, PNG） 縦横幅 50px以上 100px以下</p>
        </div>
       
        <div>
            {{ Form::submit('登録', ['class' => 'pure-button pure-button-primary']) }}
        </div>
        {{ Form::close() }}
        <!--<a href="{{ url('/profile') }}" class="pure-button pure-button-primary">戻る</a>-->
        </div>
    </div>
</div>
@endsection
        