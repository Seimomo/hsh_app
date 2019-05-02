@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    <h3 class="content-subhead">応募</h3>
    <div class="l-content">
        
            <div class="job-tables pure-g">
                <div class="pure-u-1 pure-u-md-1-3">
                    <div class="job-table job-table-free">
                        <div class="job-table-header">
                            <h3 class="content-subhead"><a href="/job/{{ $job->id }}">{{ $job->title }}</a></h3>
                        </div>
        
                        <ul class="job-table-list">
                            <li>
                                @if ($job->user->avatar_path)
                                <div class="avatar-content">
                                    <img class="post-avatar" title="依頼者" src="{{ $job->user->avatar_path }}"/>
                                    <span class="avatar-info">{{ $job->user->name }}</span>
                                </div>
                                @else
                                    <i class="job-icon fa fa-user" title="依頼者"></i><span>{{ $job->user->name }}</span>
                                @endif
                            </li>
                            <li><i class="job-icon fa fa-calendar" title="希望納期"></i>{{ $job->wish_at }}</li>
                        </ul>
                    </div>
                </div>
                <div class="pure-u-1 pure-u-md-2-3">
                    <div class="pure-g">
                        <div class="pure-u-1 pure-u-md-1-3">
                            依頼者への簡単なご挨拶と、<br>質問等があればお書きください。
                        </div>
                    <div class="pure-u-1 pure-u-md-2-3">
                    {{ Form::open(['url' => '/subscribes', 'method' => 'pure-input-1-2']) }}
                        <div class="pure-control-group">
                        {{ Form::label('message', '応募メッセージ') }}
                        {{ Form::textarea('message',$message, ['class' => 'pure-input-1-2', 
                        'placeholder' => '応募しますか？応募のメッセージで自分をアピールしてください。']) }}
                        {{ Form::hidden('job_id',$job_id) }}
                        {{ Form::hidden('user_id',$user_id) }}
                        {{ Form::hidden('status',1) }}
                        </div>
                        <div class="pure-control-group">
                        {{ Form::submit('応募', ['class' => 'pure-button pure-button-primary']) }}
                        </div>
                    {{ Form::close() }}
                    </div>
                    </div>
                </div>
            </div> <!-- end job-tables -->
        
        </div> <!-- end l-content -->
  
</div>
@endsection