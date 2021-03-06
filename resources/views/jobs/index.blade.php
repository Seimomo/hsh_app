@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">依頼内容</h3>
        {{ Form::open(['url' => '/jobs1', 'method' => 'post', 'class' => 'pure-form']) }}
            <div class="pure-control-group">
                {{ Form::label('title', '案件名') }}
                {{ Form::text('title',$title, ['class' => 'pure-input-1-2']) }}

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
            </div>
            <div class="pure-g">
                <div class="pure-u-1 pure-u-md-1-2">
                    <div class="pure-control-group">
                    {{ Form::label('content', '詳細') }}
                    {{ Form::textarea('content',$content, ['class' => 'pure-input-1']) }}
                    </div>
                    @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="pure-u-1 pure-u-md-1-2">
                    <div class="pure-control-group">
                        {{ Form::label('example', '記入例') }}
                        {{ Form::textarea('example', $example, ['class' => 'pure-input-1', 'readonly']) }}
                    </div>
                </div>
            </div>
            <div class="pure-control-group">
                {{ Form::label('wish_at', '希望納期') }}
                {{ Form::text('wish_at',$wish_at, ['class' => 'pure-input-1-2', 'id' => 'day']) }}

            @if ($errors->has('wish_at'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('wish_at') }}</strong>
                </span>
            @endif
            </div>
            <div class="pure-control-group">
                {{ Form::submit('登録', ['class' => 'pure-button pure-button-primary']) }}
                {{ Form::hidden('func',1) }}
            </div>
        {{ Form::close() }}
        <div class="l-content">
            {{ Form::open(['url' => '/jobs2', 'method' => 'post']) }}
            <h3 class="content-subhead">応募者一覧</h3>
            
            <div class="job-tables pure-g">
            
                @if(isset($subscribes))
                @foreach($subscribes as $subscribe)
                
                <div class="pure-u-1 pure-u-md-1-3">
                    @if($subscribe->status == 3) <h4 class="content-subhead red">検収OKであれば決定ボタンを押してください</h4>@endif
                    <div class="job-table job-table-free">
                        <div class="job-table-header">
                            <h3 class="content-subhead">
                                {{Form::radio('user_id', $subscribe->user->id)}} 
                                
                            @if ($subscribe->user->avatar_path)
                                <div class="avatar-content">
                                    <a href="/get_portfolio/{{ $subscribe->user->id }}">
                                        <img class="post-avatar" title="応募者" src="{{ $subscribe->user->avatar_path }}"/>
                                        <span class="avatar-info">{{ $subscribe->user->name }}</span>
                                    </a>
                                </div>
                            @else
                                <a href="/get_portfolio/{{ $subscribe->user->id }}"><i class="job-icon fa fa-user" title="応募者"></i>
                                    <span>{{ $subscribe->user->name }}</span>
                                </a>
                            @endif
                            </h3>
                        </div>
        
                        <ul class="job-table-list">
                            <li><i class="job-icon fa fa-envelope" title="メッセージ"></i>{{ $subscribe->message }}</li>
                            <li @if($subscribe->status > 1)style="color: red;"@endif><i class="job-icon fa fa-comment-o" title="ステータス"></i>{{ $subscribe->getStatusName($subscribe->status) }}</li>
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
