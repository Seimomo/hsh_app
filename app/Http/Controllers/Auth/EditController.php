<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // ユーザ情報のフォーム表示
    public function getProfile()
    {
        $user = User::find(auth()->id());
        return view('auth.profile',compact('user'));
    }
    
    // ユーザ情報（ネーム、メルアド、プロフィールメッセージ）の更新
    public function postProfile(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:20',
            'email' => 'required|email|max:255|unique:users,email,'.auth()->id()
        ]);
 
        //バリデート
        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        
        $user = User::find(auth()->id());
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        
        return $this->getProfile();
    }
}
