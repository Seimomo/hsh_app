@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">
            応募先一覧
        </h3>

        <div class="l-content">
        
            <div class="job-tables pure-g">
            
            @if(isset($subscribes))
                @foreach($subscribes as $subscribe)
                <div class="pure-u-1 pure-u-md-1-3">
                    <div class="subscribe-table job-table-free">
                        <div class="job-table-header">
                            <h3 class="content-subhead-subscribe">{{ $subscribe->job->title }}</h3>
                        </div>
        
                        <ul class="job-table-list">
                            @if ($subscribe->user->avatar_path)
                                <div class="avatar-content">
                                    <img class="post-avatar" title="依頼者" src="{{ $subscribe->user->avatar_path }}"/>
                                    <span class="avatar-info">{{ $subscribe->user->name }}</span>
                                </div>
                            @else
                                <i class="job-icon fa fa-user" title="依頼者"></i><span>{{ $subscribe->user->name }}</span>
                            @endif
                            <li><i class="job-icon fa fa-calendar" title="希望納期"></i>{{ $subscribe->job->wish_at }}</li>
                            
                            <li @if($subscribe->status > 1)style="color: pink;"@endif>
                                <i class="job-icon fa fa-comment-o" title="ステータス"></i>
                                {{ $subscribe->getStatusName($subscribe->status) }}</li>
                            <li>
                                {{ Form::open(['url' => '/subscribes', 'method' => 'post']) }}                
                                    {{ Form::hidden('job_id',$subscribe->job->id) }}
                                    {{ Form::hidden('user_id',$subscribe->user->id) }}
                                    {{ Form::hidden('status',3) }}
                                    {{ Form::submit('納品', ['class' => 'pure-button pure-button-primary']) }}
                                {{ Form::close() }}                
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            @endif

            </div> <!-- end job-tables -->
        
        </div> <!-- end l-content -->
    </div>
</div>
@endsection