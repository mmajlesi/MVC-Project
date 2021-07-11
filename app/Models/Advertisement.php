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


    protected $fillable = [
        'name',
        'price',
        'chosen',
        'dl_link',
        'img_link'
    ];
}
