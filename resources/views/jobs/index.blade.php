@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">依頼内容</h3>
        {{ Form::open(['url' => '/jobs', 'method' => 'post', 'class' => 'pure-form']) }}
            <div class="pure-control-group">
                {{ Form::label('title', '案件名') }}
                {{ Form::text('title',$title, ['class' => 'pure-input-1-2']) }}
            </div>
            <div class="pure-control-group">
                {{ Form::label('content', '詳細') }}
                {{ Form::textarea('content',$content, ['class' => 'pure-input-1-2']) }}
            </div>
            <div class="pure-control-group">
                {{ Form::label('wish_at', '希望納期') }}
                {{ Form::text('wish_at',$wish_at, ['class' => 'pure-input-1-2', 'id' => 'day']) }}
            </div>
            <div class="pure-control-group">
                {{ Form::submit('登録', ['class' => 'pure-button pure-button-primary']) }}
                {{ Form::hidden('func',1) }}
            </div>
        {{ Form::close() }}
        <div class="l-content">
            <h3 class="content-subhead">応募者一覧</h3>
            <div class="job-tables pure-g">
            
                @if(isset($subscribes))
                @foreach($subscribes as $subscribe)
                <div class="pure-u-1 pure-u-md-1-3">
                    <div class="job-table job-table-free">
                        <div class="job-table-header">
                            <h3 class="content-subhead">
                                {{Form::radio('user_id', $subscribe->user->id)}} 
                                
                            @if ($subscribe->user->avatar_path)
                                <div class="avatar-content">
                                    <img class="post-avatar" title="依頼者" src="{{ $subscribe->user->avatar_path }}"/>
                                    <span class="avatar-info">{{ $subscribe->user->name }}</span>
                                </div>
                            @else
                                <i class="job-icon fa fa-user" title="応募者"></i><span>{{ $subscribe->user->name }}</span>
                            @endif
                            </h3>
                        </div>
        
                        <ul class="job-table-list">
                            <li><i class="job-icon fa fa-envelope" title="メッセージ"></i>{{ $subscribe->message }}</li>
                            <li><i class="job-icon fa fa-comment-o" title="ステータス"></i>{{ $subscribe->getStatusName($subscribe->status) }}</li>
                        </ul>
                    </div>
                </div>
                
                @endforeach
                @endif

            </div>
            {{ Form::submit('決定', ['class' => 'pure-button pure-button-primary']) }}
            {{ Form::hidden('func',2) }}
            {{ Form::close() }}
        </div>
  </div>
</div>
<script>
  $( function() {
    $( "#day" ).datepicker({dateFormat: 'yy-mm-dd'});
  } );
</script>
@endsection
