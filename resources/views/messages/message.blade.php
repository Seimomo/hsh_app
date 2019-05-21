@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    <h3 class="content-subhead">メッセージ一覧</h3>
    <div class="pure-g">
        <div class="pure-u-1">
        <h4 class="content-subhead">受信</h4>
            <table class="pure-table pure-table-horizontal">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>送信者</th>
                        <th>日時</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($messagesToUser as $message)
                <tr>
                    <td><a href="{{ url('/message_detail', $message->id) }}">{{ $message->title }}</a></td>
                    <td>{{ $message->fromUser->name }}</td>
                    <td>{{ $message->created_at }}</td>
                </tr>
            @endforeach
                </tbody>
            </table>
            <br><br>
            
        <h4 class="content-subhead">送信</h4>
            <table class="pure-table pure-table-horizontal">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>宛先</th>
                        <th>日時</th>
                    </tr>
                 </thead>
                 <tbody>
            @foreach($messagesFromUser as $message)
                <tr>
                    <td><a href="{{ url('/message_detail', $message->id) }}">{{ $message->title }}</a></td>
                    <td>{{ $message->toUser->name }}</td>
                    <td>{{ $message->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection