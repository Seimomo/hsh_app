<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

class MessageController extends Controller
{
    public function message()
    {
        // 送信済みメッセージ
        $messagesFromUser = User::find(auth()->id())->messagesFromUser;
        // 自分宛の受信メッセージを全て取得
        $messagesToUser = User::find(auth()->id())->messagesToUser;
        return view('messages.message', compact('messagesFromUser', 'messagesToUser'));
        
    }
    
    public function send(Request $request)
    {
        // メッセージ送信
        $message = new Message();
        $message->title = $request->title;
        $message->body = $request->body;
        $message->to_user_id = $request->to;
        $message->from_user_id = auth()->id();
        $message->save();

        // 送信時宛先リスト
        $users = User::all()->pluck('name', 'id');
        // 送信済みメッセージ
        $messagesFromUser = User::find(auth()->id())->messagesFromUser;
        // 自分宛の受信メッセージを全て取得
        $messagesToUser = User::find(auth()->id())->messagesToUser;
        return view('messages.sent', compact('users', 'messagesFromUser', 'messagesToUser'));
    }
    
    public function form($id)
    {
        // 送信時宛先リスト
        $users = User::where('id', $id)->pluck('name', 'id');
        $touser_id = $id;

        return view('messages.form', compact('users', 'touser_id'));
        
    }
    
    public function detail($id)
    {
        // メッセージ詳細表示
        $message = Message::where('id', $id)->first();
        
        $message->body = str_replace("\r\n", '<br>', $message->body);

        return view('messages.detail', compact('message'));
        
    }
    
    public function resform($user_id, $message_id)
    {
        // 送信時宛先リスト
        $users = User::where('id', $user_id)->pluck('name', 'id');
        $touser_id = $user_id;
        
        $message = Message::where('id', $message_id)->first();

        $message->body = str_replace("\r\n", "\r\n> ", $message->body);
        
        $message->body = "> ".$message->body;
        
        return view('messages.resform', compact('users', 'touser_id', 'message'));
        
    }
    
}
