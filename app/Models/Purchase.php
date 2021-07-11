<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function advertisement()
    {
        return $this->belongsTo('App\Models\Advertisement');
    }

    protected $fillable = [
        'issue_tracking',
    ];
}
