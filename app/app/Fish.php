<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{

    protected $table = 'fishes';

    protected $fillable = [
        'post_id','fish'
    ];

}
