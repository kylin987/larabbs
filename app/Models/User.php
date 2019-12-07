<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use Notifiable, MustVerifyEmailTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'introduction','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //和话题模型绑定关联，用户与话题中间的关系是 一对多 的关系
    public function topics(){
        return $this->hasMany(Topic::class);
    }

    //和回复模型绑定关联，用户可以拥有多条回复
    public function replies(){
        return $this->hasMany(Reply::class);
    }

    //判断该话题是否是自己的
    public function isAuthorOf($model){
        return $this->id == $model->user_id;
    }
}
