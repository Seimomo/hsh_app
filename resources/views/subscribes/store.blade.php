@extends('layout')
@section('content')
@include('navbar')
<div class="content hsh-container">
    <h3 class="content-subhead">応募</h3>
    <div class="l-content">
        
        <div class="job-tables pure-g">
            <div class="pure-u-1 pure-u-md-1-3">
                <div class="job-table job-table-free">
                    <div class="job-table-header">
                        <h3 class="content-subhead"><a href="/job/{{ $job->id }}">{{ $job->title }}</a></h3>
                    </div>
    
                    <ul class="job-table-list">
                        <li>
                            @if ($job->user->avatar_path)
                            <div class="avatar-content">
                                <img class="post-avatar" title="依頼者" src="{{ $job->user->avatar_path }}"/>
                                <span class="avatar-info">{{ $job->user->name }}</span>
                            </div>
                            @else
                                <i class="job-icon fa fa-user" title="依頼者"></i><span>{{ $job->user->name }}</span>
                            @endif
                        </li>
                        <li><i class="job-icon fa fa-calendar" title="希望納期"></i>{{ $job->wish_at }}</li>
                    </ul>
                </div>
            </div>
            <div class="pure-u-1 pure-u-md-2-3">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-3">
                            応募完了しました。<br>依頼者から決定されるまでお待ちください。
                    </div>
                    <div class="pure-u-1 pure-u-md-2-3">
                        
                       <div class="job-table job-table-free">
                            <div class="job-table-header">
                                <h3 class="content-subhead"><a href="{{ url('/subscribes') }}">応募状況</a></h3>
                            </div>
            
                            <ul class="job-table-list">
                                <li><i class="job-icon fa fa-envelope"></i>応募メッセージ</li>
                                <li>{{$message}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end job-tables -->
    </div> <!-- end l-content -->
</div> 
@endsection