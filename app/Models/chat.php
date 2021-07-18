<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    public function advertisement()
    {
        return $this->belongsTo('App\Models\Advertisement');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','buyer','id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    protected $fillable = [
        'buyer',
        'advertiser',
        'advertisement_id'
    ];
}
