@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    <h3 class="content-subhead">プロフィール編集</h3>
    <div class="pure-g">
        <div class="pure-u-1">
            <form class="pure-form pure-form-aligned" method="POST" action="{{ url('profile') }}">
                @csrf
                <fieldset>
                <div class="pure-control-group">
                    <label for="name">{{ __('表示名') }}</label>
                    <input id="name" type="text" class="pure-input-1-2{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="pure-control-group">
                    <label for="email">{{ __('メールアドレス') }}</label>
 
                    <input id="email" type="email" class="pure-input-1-2{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    
                </div>

                <div class="pure-control-group">
                    <label for="message">{{ __('自己PR') }}</label>

                    <textarea id="message" class="pure-input-1-2{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message">{{ old('message', $user->message) }}</textarea>

                    @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="pure-control-group">
                    
                    <button type="submit" class="pure-button pure-button-primary">
                        {{ __('保存') }}
                    </button>
                   
                </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection