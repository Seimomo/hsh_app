<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'type', 'name', 'email', 'gender', 'body'
    ];
    static $types = [
        'サイトについて', '使い方について', 'その他'
    ];

}
