<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.user')
            ->with('id', '26')
            ->with('name', 'Wulan');
    }
}
