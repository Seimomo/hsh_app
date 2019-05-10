@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">{{ __('パスワードリセット') }}</h3>
            <div class="pure-g">
                <div class="pure-u-1 pure-md-u-1-2">
                    <form class="pure-form pure-form-aligned" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <fieldset>
                            <input type="hidden" name="token" value="{{ $token }}">
    
                            <div class="pure-control-group">
                                <label for="email">{{ __('メールアドレス') }}</label>

                                <input id="email" type="email" placeholder="メールアドレスを入力してください" class="pure-input-1-2{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

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
    
                                <input id="password-confirm" type="password"  placeholder="確認用パスワードを入力してください" class="pure-input-1-2" name="password_confirmation" required>
                            
                            </div>
    
                            <div class="pure-controls">
                                
                                <button type="submit" class="pure-button pure-button-primary">
                                    {{ __('パスワードリセット') }}
                                </button>
                               
                            </div>
                        </fieldset>
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
