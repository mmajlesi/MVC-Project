<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function purchase()
    {
        return $this->hasOne('App\Models\Purchase');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    protected $fillable = [
        'name',
        'price',
        'chosen',
        'status',
        'dl_link',
        'prev_link',
        'img_link',
        'user_id'
    ];
}
