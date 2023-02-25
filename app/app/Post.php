<?php

namespace App;

use App\User;

use App\Fish;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post','image', 'weather', 'tide','fishing_spot','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class)->First();
    }

    public function fish(){
        return $this->hasMany('App\Fish', 'post_id', 'posts.id');
    }

}
