<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Guard;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:admins')->except('logout');
    }


    /**
     * Get the guard instance for the admin authentication.
     *
     * @return Guard
     */

    protected function guard()
    {
        return Auth::guard('admins');
    }

    /**
     * 管理者側のログイン画面へ遷移
     * @return View
     */

    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * 前にアクセスしたページに限らず、ログイン後はadmin一覧にいく
     *
     * @param Request $request
     * @return Response|JsonResponse|RedirectResponse
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
            : redirect()->route('admin_users.index');
    }


    /**
     * ログアウト後はログインページにいく(user, adminの連結を排除)
     *
     * @param  Request  $request
     * @return RedirectResponse
     */

    public function logout(Request $request)
    {
        $this->guard()->logout();

        return redirect()->route('admin.login.form');
    }
}
