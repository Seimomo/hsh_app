<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactsController extends Controller
{
    public function index()
    {
        $types = Contact::$types;
 
        return view('contacts.index', compact('types'));
    }
    
    public function confirm(ContactRequest $request)
    {
        $contact = new Contact($request->all());
     
        // 「お問い合わせ種類（checkbox）」を配列から文字列に
        $type = '';
        if (isset($request->type)) {
            $type = implode(', ',$request->type);
        }
     
        return view('contacts.confirm', compact('contact', 'type'));
    }
    
    public function complete(ContactRequest $request)
    {
        $input = $request->except('action');
         
        if ($request->action === '戻る') {
            return redirect()->action('ContactsController@index')->withInput($input);
        }
     
        // チェックボックス（配列）を「,」区切りの文字列に
        if (isset($request->type)) {
            $request->merge(['type' => implode(', ', $request->type)]);
        }
     
        // データを保存
        Contact::create($request->all());
     
        // 二重送信防止
        $request->session()->regenerateToken();
      
        // 送信メール
        // $from = env('mail_from_address','');
        \Mail::send(new \App\Mail\Contact([
            'to' => $request->email,
            'to_name' => $request->name,
            'from' => 'homepageskillhelper@gmail.com',
            'from_name' => 'Homepage Skill Helper',
            'subject' => 'お問い合わせありがとうございました。',
            'type' => $request->type,
            'body' => $request->body
        ]));
     
        // 受信メール
        \Mail::send(new \App\Mail\Contact([
            'to' => 'homepageskillhelper@gmail.com',
            'to_name' => 'Homepage Skill Helper',
            'from' => $request->email,
            'from_name' => $request->name,
            'subject' => 'サイトからのお問い合わせ',
            'type' => $request->type,
            'body' => $request->body
        ], 'from'));
        
        return view('home');
    }
}
