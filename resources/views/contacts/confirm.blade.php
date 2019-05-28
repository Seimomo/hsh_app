@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content hsh-container">
        <div class="pure-g">
            <div class="pure-u-1">
                <div class="panel panel-default">
                    <h3 class="content-subhead">お問い合わせ</h3>
                    <div class="panel-body">
                        <p>誤りがないことを確認の上、送信ボタンをクリックしてください。</p>
     
                        <table class="pure-table pure-table-bordered">
                            <tr>
                                <th>お問い合わせ種類</th>
                                <td>{{ $type }}</td>
                            </tr>
                            <tr>
                                <th>お名前</th>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <th>メールアドレス</th>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <th>内容</th>
                                <td><pre>{{ $contact->body }}</pre></td>
                            </tr>
                        </table>
     
                        {!! Form::open(['url' => 'contact/complete',
                                        'class' => 'form-horizontal',
                                        'id' => 'post-input']) !!}
     
                        @foreach($contact->getAttributes() as $key => $value)
                            @if(isset($value))
                                @if(is_array($value))
                                    @foreach($value as $subValue)
                                        <input name="{{ $key }}[]" type="hidden" value="{{ $subValue }}">
                                    @endforeach
                                @else
                                    {!! Form::hidden($key, $value) !!}
                                @endif
     
                            @endif
                        @endforeach
     
                        {!! Form::submit('戻る', ['name' => 'action', 'class' => 'pure-button']) !!}
                        {!! Form::submit('送信', ['name' => 'action', 'class' => 'pure-button pure-button-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection