<?php

namespace App\Http\Controllers;
use App\Job;
use App\Subscribe;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    
    //依頼内容一覧
    public function list()
    {
        // 応募中の案件のみ取得する
        $list = Job::where('job_status', 1)->get();
        // $jobs = Job::all();
        // $list = array();
        
        // foreach($jobs as $job) {
        //     $status = Subscribe::where('job_id', $job->id)->max('status');
        //     if (!isset($status) || $status == 1) {
        //         array_push($list, $job);
        //     }
        // }
        
        // $list = array();
        // // 応募中の案件のみ取得する
        // $query = Subscribe::where('status', '>=', 2)->get();
        // foreach($jobs as $job) {
        //     $flag = true;
        //     foreach($query as $val) {
        //         if ($job->id == $val->job_id) {
        //             $flag = false;
        //         }
        //     }
        //     if ($flag) {
        //         array_push($list, $job);
        //     }
        // }
        
        return view('pages.jobList',compact('list'));
    }
    
    //依頼内容詳細
    public function show($id)
    {
        $job = Job::find($id);
        //改行の置換
        $job->content = str_replace("\r\n", '<br>', $job->content);
        return view('pages.job',compact('job'));
    }
    
}
