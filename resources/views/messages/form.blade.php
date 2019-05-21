@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    <h3 class="content-subhead">メッセージ送信</h3>
    <div class="pure-g">
        <div class="pure-u-1">
            <!-- メッセージを送信するフォーム -->
            {{ Form::open(['url' => '/send', 'method' => 'post', 'class' => 'pure-input-1-2']) }}
                {{ Form::label('to', '宛先') }}
                {{Form::select('to', $users, $touser_id)}}
                <br>
                {{ Form::label('title', 'タイトル') }}
                {{ Form::text('title') }}
                <br>
                {{ Form::label('body', '本文') }}
                {{ Form::textarea('body') }}
                <br>
                {{ Form::submit('送信', ['class' => 'pure-button pure-button-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
