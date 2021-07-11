<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    public function get_advertisements()
    {
        return view('advertisements');
    }
    public function get_advertisement($id)
    {
        return view('advertisement_info')->with('id', $id);
    }
    public function get_chosen_advertisements()
    {
        return view('index');
    }
}
