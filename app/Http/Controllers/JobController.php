<?php

namespace App\Http\Controllers;

use App\Job;
use Carbon\Carbon;
use App\Subscribe;
use App\Portfolio;
use Validator;

use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Job::where('user_id', '=', auth()->id())->where('job_status','<>',4)->first();
        
        $text = 
    "書き方の例）
【 概要 】当方、人材会社を新規設立します。今回、コーポレートサイト制作をお願いします。
【 依頼内容 】・依頼工程：デザイン、コーディング、レスポンシブ対応、SEO対策・作業ボリューム：◯ページ程度 など
【 提供素材 】・ワイヤー、ラフ案：あり / なし（相談したい）・画像、文章等：あり / なし（相談したい）・サーバー、ドメイン： あり / なし（相談したい）
【 デザインイメージ 】・ターゲット層：20〜40代ビジネスマン・雰囲気：シンプル、スタイリッシュ、フラットなデザイン・参考サイト： ◯◯◯のサイト / https://test.jp　";


        if (isset($data)) {
            $title = $data->title;
            $content = $data->content;
            $wish_at = $data->wish_at;
            
            $query = Subscribe::query();
            if ($data->job_status > 1) {
                $query->where('job_id',$data->id)->where('status', '=', $data->job_status);
            } else {
                $query->where('job_id',$data->id); 
            }
            $subscribes = $query->get();
            $example = $text;
        } else {
            $title = '';
            $content = '';
            $wish_at = '';
            $job_status = 1;
            $subscribes = null;
            $example = $text;
        }
        return view('jobs.index',compact('title','content','wish_at','subscribes','example'));
    }
    
    public function store(Request $request)
    {

        if ($request->func == 1) {
            $validator = Validator::make($request->all(), [
                'title'  => 'required',
                'content' => 'required',
                'wish_at'  => 'required|date_format:Y-m-d'
            ]);

            //バリデート
            if ($validator->fails())
            {
                return back()->withInput()->withErrors($validator);
            }
        } 
        
        
        $data = Job::where('user_id', '=', auth()->id())->where('job_status','<>',4)->first();
        if (!isset($data)) {
            $data = new Job();
        }
        $data->title = $request->title;
        $data->content = $request->content;
        $data->user_id = auth()->id();
        $data->wish_at = $request->wish_at;//date_format(Carbon::now() , 'Y-m-d');
        $data->job_status = 1;
        if ($request->func == 1) {
            //案件登録
            $data->save();
        } else if ($request->func == 2) {
            //応募者から決定
            $query = Subscribe::query();
            $query->where('job_id',$data->id); 
            $query->where('status','<>',1);
            if ($query->count() == 0) {
                //応募者だけの時は指定の人を決定とする
                $query = Subscribe::query();
                $query->where('job_id',$data->id); 
                $query->where('user_id',$request->user_id); 
                $query->where('status',1);
                $subscribes = $query->first();
                
                $query_job = Job::query();
                $query_job->where('id',$data->id);
                $jobs = $query_job->first();
                if (isset($subscribes)) {
                    //決定する人が特定できた時
                    $subscribes->status = 2;
                    $subscribes->save();
                    $jobs->job_status = 2;
                    $jobs->save();
                }
            } else {
                //納品があるか？
                $query = Subscribe::query();
                $query->where('job_id',$data->id); 
                $query->where('user_id',$request->user_id); 
                $query->where('status',3);
                
                if ($query->count() == 1) {
                    //納品がある
                    $subscribes = $query->first();
                    
                    $query_job = Job::query();
                    $query_job->where('id',$data->id);
                    $jobs = $query_job->first();
                    
                    if (isset($subscribes)) {
                        //決定する人が特定できた時
                        $subscribes->status = 4;
                        $subscribes->save();
                        
                        $jobs->job_status = 4;
                        $jobs->job_done_at = date_format(Carbon::now() , 'Y-m-d');
                        $jobs->save();
                        //ポートフォリオに入れる
                        $portfolio = new Portfolio();
                        $portfolio->user_id=$request->user_id;
                        $job = Job::find($data->id);
                        $portfolio->title = $job->title;
                        $portfolio->content = '';
                        $portfolio->save();
                    }
                }
            }
        }
        //return $this->index();
        return view('home');
    }
    public function showdone()
    {
        $list = Job::where('user_id', '=', auth()->id())->where('job_status','=', 4)->get();

        return view('jobs.showdone',compact('list'));
    }
}
