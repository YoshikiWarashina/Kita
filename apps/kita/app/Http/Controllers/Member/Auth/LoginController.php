<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:members')->except('logout');
    }

    /**
     * Get the guard instance for the user authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */

    protected function guard()
    {
        return Auth::guard('members');
    }

    /**
     * 前にアクセスしたページに限らず、ログイン後は記事一覧にいく
     *
     * @param \Illuminate\Http\Request $request
     * @return　\Illuminate\Http\Response|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('article.index');
    }

    /**
     * ログアウト後はログインページにいく(user, adminの連結を排除)
     *
     * @param \Illuminate\Http\Request $request
     * @return　\Illuminate\Http\Response|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */

    public function logout(Request $request)
    {
        $this->guard()->logout();

        return redirect()->route('login.form');
    }
}
