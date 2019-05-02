<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\User;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    // avatarを表示する
    public function dispAvatar()
    {
        $user = User::find(auth()->id());
        return view('auth.avatar', compact('user'));
    }
    
    // avatarのアップロード
    public function uploadAvatar(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
                // 最小縦横50px 最大縦横100px
                'dimensions:min_width=50,min_height=50,max_width=100,max_height=100',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            // S3にアップロード
            $path = $request->file->store('avatar', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $url = Storage::disk('s3')->url($path);

            // パスをDBに保存
            $user = User::find(auth()->id());
            $user->avatar_path = $url;
            $user->save();

            return redirect('/avatar')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }

}
