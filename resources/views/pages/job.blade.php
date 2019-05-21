@extends('layout')
@section('content')
@include('navbar')
<div id="layout" class="hsh-container">
    <div class="content">
            <!-- A wrapper for all the blog posts -->
            <div class="posts">
                <h3 class="content-subhead">{{$job->title}}</h3>

                <!-- A single blog post -->
                <section class="post">
                    <header class="post-header">

                        <p class="post-meta">
                            <span class="job-icon">依頼者</span>
                            @if ($job->user->avatar_path)
                            <div class="avatar-content">
                                <img class="post-avatar" title="依頼者" src="{{ $job->user->avatar_path }}"/>
                                <span class="avatar-info">{{ $job->user->name }}</span>
                            </div>
                            @else
                                <i class="job-icon fa fa-user" title="依頼者"></i><span>{{ $job->user->name }}</span>
                            @endif
                        </p>
                        <p><span class="job-icon">希望納期</span><i class="job-icon fa fa-calendar" title="希望納期"></i>{{ $job->wish_at }}</p>
                    </header>

                    <div class="post-description">
                        <p>
                            {!!$job->content!!}
                        </p>
                    </div>
                </section>
            </div>
            <a href="{{ url('/message_form', $job->user->id) }}" class="button-secondary pure-button">メッセージを送る</a>
            @if ($job->job_status == 1)
                <a href="{{ url('/subscribes', $job->id) }}" class="button-secondary pure-button">応募</a>
            @endif
    </div>
</div>
@endsection