@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">完了一覧</h3>

        <div class="l-content">
        
            <div class="job-tables pure-g">
            
            
                @foreach($list as $job)
                <div class="pure-u-1 pure-u-md-1-3">
                    <div class="job-table job-table-free">
                    <div class="job-table-header">
                        <h3 class="content-subhead"><a href="/job/{{ $job->id }}">{{ $job->title }}</a></h3>
                    </div>
    
                    <ul class="job-table-list">
                        
                        <li><i class="job-icon fa fa-calendar" title="完了日"></i>{{ $job->job_done_at }}</li>
                    </ul>
                </div>
                </div>
                @endforeach

            </div> <!-- end job-tables -->
        
        </div> <!-- end l-content -->
    </div>
    
</div>
@endsection