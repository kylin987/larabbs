<?php

namespace App\Models;

class Topic extends Model
{
    //定义可以被修改的字段
    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'reply_count', 'view_count', 'last_reply_user_id', 'order', 'excerpt', 'slug'];

    //和category绑定一对一的关系，每个帖子只属于一个分类
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //和User绑定一对一的关系，每个帖子属于一个用户（作者）
    public function user(){
        return $this->belongsTo(User::class);
    }
}
