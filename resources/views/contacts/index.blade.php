@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <div class="pure-g">
            <div class="pure-u-1">
                <div class="panel panel-default">
                    <h3 class="content-subhead">お問い合わせ</h3>
                    <div class="panel-body">
                        {{-- エラーの表示 --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
     
                        {!! Form::open(['url' => 'contact/confirm',
                                    'class' => 'pure-form']) !!}
     
                        <div class="pure-control-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            {!! Form::label('type', 'お問い合わせ種類:', ['class' => 'pure-u-1-3 control-label']) !!}
                            <div class="col-sm-10">
                                @foreach($types as $key => $value)
                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('type[]', $value) !!}
                                        {{ $value }}
                                    </label>
                                @endforeach
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
     
                        <div class="pure-control-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'お名前:', ['class' => 'pure-u-1-3 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
     
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
     
                        <div class="pure-control-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'メールアドレス:', ['class' => 'pure-u-1-3 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
     
                        <div class="pure-control-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            {!! Form::label('body', '内容:', ['class' => 'pure-u-1-3 control-label']) !!}
                            <div class="pure-u-5-6">
                                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
     
                        <div class="pure-control-group">
                            <div class="pure-u-5-6">
                                {!! Form::submit('確認', ['class' => 'pure-button pure-button-primary']) !!}
                            </div>
                        </div>
     
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>        
        
    </div>
</div>
@endsection