@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    <h3 class="content-subhead">会員登録</h3>
    <form class="pure-form pure-form-aligned" method="POST" action="{{ route('register') }}">
        @csrf
        <fieldset class="pure-u-1 pure-md-1-2">
            <div class="pure-control-group">
                <label for="name">{{ __('表示名') }}</label>
                <input id="name" type="text" placeholder="表示される名前を入力してください" class="pure-input-1-2{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
    
            <div class="pure-control-group">
                <label for="email">{{ __('メールアドレス') }}</label>
                <input id="email" type="email" placeholder="メールアドレスを入力してください" class="pure-input-1-2{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
    
            <div class="pure-control-group">
                <label for="password">{{ __('パスワード') }}</label>
                <input id="password" type="password" placeholder="パスワードを入力してください" class="pure-input-1-2{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
    
            <div class="pure-control-group">
                <label for="password-confirm">{{ __('確認用パスワード') }}</label>
                <input id="password-confirm" type="password" placeholder="確認用パスワードを入力してください" class="pure-input-1-2" name="password_confirmation" required>
                
            </div>
    
            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">
                    {{ __('登録') }}
                </button>
            </div>
        </fieldset>
    </form>

</div>
@endsection
