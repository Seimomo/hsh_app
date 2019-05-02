@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    <h3 class="content-subhead">ログイン</h3>
    <div class="pure-g">
        <div class="pure-u-1 pure-md-u-1-2">
    <form class="pure-form pure-form-aligned" method="POST" action="{{ route('login') }}">
        @csrf
        <fieldset>
            <div class="pure-control-group">
                <label for="email">{{ __('メールアドレス') }}</label> 
                <input id="email" type="email" placeholder="メールアドレスを入力してください" class="pure-input-1-2{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
    
            <div class="pure-controls">
                <label for="remember" class="pure-checkbox">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('ログイン状態を保存する') }}
                </label>
    
                <button type="submit" class="pure-button pure-button-primary">{{ __('ログイン') }}</button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('パスワードをお忘れですか?') }}
                    </a>
                @endif
            </div>
        </fieldset>
        </div>
        </div>
    </form>
</div>
@endsection
