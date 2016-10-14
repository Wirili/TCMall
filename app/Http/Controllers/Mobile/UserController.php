<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('mobile.user.index');
    }

    public function address()
    {
        return view('mobile.user.address');
    }
}
