@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    <h3 class="content-subhead">メッセージ詳細</h3>
    <section class="post">
        <header class="post-header">

            <p class="post-meta">
                <span class="job-icon">タイトル</span><i class="job-icon fa fa-envelope-o" title="タイトル"></i>{{ $message->title }}
            </p>
            <p><span class="job-icon">送信元</span>
                
                <i class="job-icon fa fa-user" title="送信元"></i><span>：{{$message->fromUser->name}}</span>
            </p>
            <p><span class="job-icon">日時</span>
                
                <i class="job-icon fa fa-calendar" title="送信元"></i><span>：{{$message->created_at}}</span>
            </p>
            <p><span class="job-icon">宛先</span>
                
                <i class="job-icon fa fa-user" title="宛先"></i><span>：{{$message->toUser->name}}</span>
            </p>
        </header>

        <div class="post-description">
            <p>
                {!!$message->body!!}
            </p>
        </div>
        <a href="/message_resform/{{$message->fromUser->id}}/{{$message->id}}" class="button-secondary pure-button">返信</a>
    </section>
</div>
@endsection
