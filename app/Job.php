<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    private static $listName = [1 => '応募', 2 => '契約中', 3 => '納品済み', 4 => '検収完了'];
   
    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }
    
    public function subscribesToJob() {
      return $this->hasMany('App\Subscribe','job_id');
    }
}
