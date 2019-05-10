@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">ポートフォリオ一覧</h3>

        <div class="l-content">
        
            <div class="job-tables pure-g">
            
            
                @foreach($portfolios as $portfolio)
                <div class="pure-u-1 pure-u-md-1-3">
                    <div class="job-table job-table-free">
                    <div class="job-table-header">
                        <h3 class="content-subhead"><a href="/show_portfolio/{{ $portfolio->id }}">{{ $portfolio->title }}</a></h3>
                        <h4 class="content-subhead">{{ $portfolio->content }}</h4>
                    </div>
    
                    <ul class="job-table-list">
                        
                        <li>
                            @if ($portfolio->user->avatar_path)
                            <div class="avatar-content">
                                <img class="post-avatar" title="作成者" src="{{ $portfolio->user->avatar_path }}"/>
                                <span class="avatar-info">{{ $portfolio->user->name }}</span>
                            </div>
                            @else
                                <i class="job-icon fa fa-user" title="作成者"></i><span>{{ $portfolio->user->name }}</span>
                            @endif
                            
                        </li>
                        <li><i class="job-icon fa fa-calendar" title="作成日"></i>{{ $portfolio->created_at }}</li>
                    </ul>
                </div>
                </div>
                @endforeach

            </div> <!-- end job-tables -->
        
        </div> <!-- end l-content -->
    </div>
    
</div>
@endsection