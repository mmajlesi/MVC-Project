<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Message extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'sender', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i');
    }

    protected $fillable = [
        'text',
        'seen',
        'sender',
        'receiver',
        'chat_id'
    ];
}
