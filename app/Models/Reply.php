<?php

namespace App\Models;

class Reply extends Model
{
    protected $fillable = ['content'];

    //和话题建立一对多的关系
    public function topic(){
        return $this->belongsTo(Topic::class);
    }

    //和用户建立一对多的关系
    public function user(){
        return $this->belongsTo(User::class);
    }
}
