@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">依頼一覧</h3>

        <div class="l-content">
        
            <div class="job-tables pure-g">
            
            
                @foreach($list as $job)
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
                @endforeach

            </div> <!-- end job-tables -->
        
        </div> <!-- end l-content -->
    </div>
    
</div>
@endsection