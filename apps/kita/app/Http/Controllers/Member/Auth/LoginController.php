<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

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
     * @return Guard
     */

    protected function guard()
    {
        return Auth::guard('members');
    }
    
    /**
     * ログイン後のリダイレクト先
     *
     * @return string
     */

    protected function redirectTo()
    {
        return route('article.index');
    }

    /**
     * ログイン後のリダイレクト処理
     *
     * @return RedirectResponse
     */

    protected function authenticated(Request $request, $user)
    {
        return redirect($this->redirectTo());
    }

    /**
     * ログアウト後はログインページにいく(user, adminの連結を排除)
     *
     * @param Request $request
     * @return Response|JsonResponse|RedirectResponse
     */

    public function logout(Request $request)
    {
        $this->guard()->logout();

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(route('login.form'));
    }
}
