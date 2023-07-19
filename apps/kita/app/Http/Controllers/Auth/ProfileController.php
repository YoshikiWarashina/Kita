<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     *ユーザー用プロフィール画面の表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit()
    {
        return view('user.profile');
    }
}
