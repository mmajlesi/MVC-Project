<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Tag;
use App\models\User;
use App\models\Advertisement;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkRole')->only('panel');
    }

    public function panel()
    {
        $user = Auth::user()->load(['purchases.advertisement.tags']);
        $tags = Tag::all();
        $advertisement = Advertisement::where('user_id', Auth::user()->id)->get();
        return view('panel', ['user' => $user, 'tags' => $tags, 'advertisement' => $advertisement]);
    }
    public function admin()
    {
        $users = User::all();
        $advertisement = Advertisement::all();
        return view('admin', ['users' => $users, 'advertisement' => $advertisement]);
    }
    public function delete_user(Request $request)
    {
        $user = User::find($request->id);
        if ($user->role == 'admin')
            return back()->with('error', 'امکان حذف ادمین وجود ندارد');
        else {
            $user->delete();
            return back()->with('success', 'حذف با موفقیت انجام شد');
        }
    }
}
