<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Validator;

class PortfolioController extends Controller
{
    // ログイン前の全員の作成者一覧
    public function index()
    {
        $query = Portfolio::query();
        $portfolios = $query->distinct()->select('user_id')->get();
        
        return view('portfolios.index',compact('portfolios'));
    }
    
    // ログイン前のポートフォリオ一覧（作成者一覧からのリンク）
    public function getMessagePortfolio($id)
    {
        $query = Portfolio::query();
        $query->where('user_id',$id);
        $portfolios = $query->get();
        return view('portfolios.messageportfolios',compact('portfolios'));
    }
    
    // ログイン後のポートフォリオ編集一覧（応募者一覧からのリンク）
    public function getUserPortfolio($id)
    {
        $query = Portfolio::query();
        $query->where('user_id',$id);
        $portfolios = $query->get();
        return view('portfolios.userportfolios',compact('portfolios'));
    }
    
    // ログイン後のポートフォリオ編集一覧
    public function getPortfolio()
    {
        $query = Portfolio::query();
        $query->where('user_id',auth()->id());
        $portfolios = $query->get();
        return view('portfolios.portfolios',compact('portfolios'));
    }
    
    // ログイン後のポートフォリオ編集詳細フォーム
    public function showPortfolio($id)
    {
        $query = Portfolio::query();
        $query->where('id', $id);
        $data = $query->get()->first();
        
        $title = $data->title;
        $content = $data->content;
        $id = $data->id;
        return view('portfolios.portfolio',compact('title', 'content', 'id'));
    }
    
    // ログイン後のポートフォリオ編集詳細の登録
    public function updatePortfolio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'  => 'required',
            'content'  => 'required'
        ]);
 
        //バリデート
        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
         
        $query = Portfolio::query();
        $query->where('id', $request->id);
        $data = $query->get()->first();
        
        $data->title = $request->title;
        $data->content = $request->content;
        
        //ポートフォリオ登録
        $data->save();
        
        $title = $data->title;
        $content = $data->content;
        $id = $data->id;
        return view('portfolios.portfolio',compact('title', 'content', 'id'));
    }
}
