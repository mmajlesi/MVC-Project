<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Tag;
use App\models\Advertisement;

class UserController extends Controller
{
    public function panel()
    {
        $user = Auth::user()->load(['purchases.advertisement.tags']);
        $tags = Tag::all();
        $advertisement = Advertisement::where('user_id', Auth::user()->id)->get();
        return view('/panel', ['user' => $user, 'tags' => $tags, 'advertisement' => $advertisement]);
    }
}
