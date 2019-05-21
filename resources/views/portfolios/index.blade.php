@extends('layout')
@section('content')
@include('navbar')
<div class="hsh-container">
    <div class="content">
        <h3 class="content-subhead">作成者一覧</h3>
        <h4 class="content-subhead">ポートフォリオは作成者のリンクよりご覧いただけます</h4>
        <div class="l-content">
        
            <div class="job-tables pure-g">
            
            
                @foreach($portfolios as $portfolio)
                <div class="pure-u-1 pure-u-md-1-3">
                    <div class="job-table job-table-free">
                    <div class="job-table-header">
                        <h3 class="content-subhead">
                            @if ($portfolio->user->avatar_path)
                            <div class="avatar-content">
                                <img class="post-avatar" title="作成者" src="{{ $portfolio->user->avatar_path }}"/>
                                <span class="avatar-info">{{ $portfolio->user->name }}</span>
                            </div>
                            @else
                                <a href="/get_userportfolio/{{ $portfolio->user->id }}"><i class="job-icon fa fa-user" title="作成者"></i><span>{{ $portfolio->user->name }}</span></a>
                            @endif
                            
                        </h3>

                    </div>
    
                    <ul class="job-table-list">
                        
                        <li title="自己PR">{{ $portfolio->user->message }}</li>
                    </ul>
                </div>
                </div>
                @endforeach

            </div> <!-- end job-tables -->
        
        </div> <!-- end l-content -->
    </div>
    
</div>
@endsection