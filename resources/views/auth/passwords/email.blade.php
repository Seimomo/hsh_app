@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">{{ __('パスワードリセット') }}</h3>
            <div class="pure-g">
                <div class="pure-u-1 pure-md-u-1-2">

                
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="pure-form pure-form-aligned" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <fieldset>

                        <div class="pure-control-group">
                            <label for="email">{{ __('メールアドレス') }}</label>
    
                            
                            <input id="email" type="email" placeholder="メールアドレスを入力してください" class="pure-input-1-2{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>
    
                        <div class="pure-controls">
                            
                            <button type="submit" class="pure-button pure-button-primary">
                                {{ __('パスワードリセットリンク送信') }}
                            </button>
                            
                        </div>
                    </fieldset>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
