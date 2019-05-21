@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">ポートフォリオ編集</h3>
        {{ Form::open(['url' => '/update_portfolio', 'method' => 'post', 'class' => 'pure-form']) }}
            <div class="pure-control-group">
                {{ Form::label('title', '案件名') }}
                {{ Form::text('title',$title, ['class' => 'pure-input-1-2']) }}
            </div>
            <div class="pure-control-group">
                {{ Form::label('content', '詳細') }}
                {{ Form::textarea('content',$content, ['class' => 'pure-input-1-2', 
                            'placeholder' => '作成したホームページの内容や使用したスキルを登録ください。']) }}
            </div>
            
            <div class="pure-control-group">
                {{ Form::submit('登録', ['class' => 'pure-button pure-button-primary']) }}
                {{ Form::hidden('id',$id) }}
            </div>
        {{ Form::close() }}
        
  </div>
</div>
@endsection
