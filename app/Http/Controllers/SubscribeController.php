<?php

namespace App\Http\Controllers;

use App\Subscribe;
use App\Job;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //応募状況表示
    public function index()
    {
        $query = Subscribe::query();
        $query->where('user_id',auth()->id()); 
        $subscribes = $query->get();
        return view('subscribes.index',compact('subscribes'));
    }
    
    //応募画面
    public function show($id)
    {
        $example = "書き方の例）
【自己紹介】
氏名や職種、案件に興味をもった理由などを記載しましょう。
クライアントからの信頼感につながります。

【職務経験・実績・スキル】
自身の職務経験やデザインスキル、応募する案件と似た過去実績を記載しましょう。
内容を詳細に書くことで契約率が高まります。

【案件に関する質問や対応期間】
作業についての質問や自分のスケジュールなどを記載しましょう。
その後のやりとりがスムーズになります。";

        $job = Job::find($id);
        $query = Subscribe::query();
        $query->where('user_id',auth()->id()); 
        $query->where('job_id',$id); 
        $query->where('status',1);
        $data = $query->first();

        $job_id = $id;
        $user_id = auth()->id();
        if (isset($data)) {
            $message = $data->message;
        } else {
            $message = '';
        }
        return view('subscribes.show',compact('job','message','job_id','user_id','example'));
    }
    
    //応募・納品
    public function store(Request $request)
    {
        $job = Job::find($request->job_id);
        $query = Subscribe::query();
        $query->where('user_id',$request->user_id); 
        $query->where('job_id',$request->job_id); 
        $query->where('status',$request->status);
        $data = $query->first();

        if (!isset($data)) {
            $data = new Subscribe();
            $data->user_id = $request->user_id;
            $data->job_id = $request->job_id;
            $data->status = $request->status;
        }
        $data->message = $request->message;
        $job_id = $data->job_id;
        $user_id = $data->user_id;
        $message = $data->message;
        if ($request->status == 1) {
            //応募
            $data->save();
            return view('subscribes.store',compact('job','message','job_id','user_id'));
        } else if ($request->status == 3) {
            //納品
            $query = Subscribe::query();
            $query->where('job_id',$job_id); 
            $query->where('user_id',$user_id); 
            $query->where('status',2);
            $subscribes = $query->first();
            
            $query_job = Job::query();
            $query_job->where('id',$job_id);
            $jobs = $query_job->first();
            if (isset($subscribes)) {
                //決定する人が特定できた時
                $subscribes->status = 3;
                $subscribes->save();
                
                $jobs->job_status = 3;
                $jobs->save();
            }
            return $this->index();
        }
        
    }
}
