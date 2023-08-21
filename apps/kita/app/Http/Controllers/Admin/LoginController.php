<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/admin_users';
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
     * @return \Illuminate\Contracts\Auth\Guard
     */

    protected function guard()
    {
        return Auth::guard('admins');
    }

    /**
     * 管理者側のログイン画面へ遷移
     * @return \Illuminate\Contracts\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * 前にアクセスしたページに限らず、ログイン後はadmin一覧にいく
     *
     * @param Illuminate\Http\Request $request
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
            : redirect()->route('admin_users.index');
    }


    /**
     * ログアウト後はログインページにいく(user, adminの連結を排除)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */

    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('admin.login.form');
    }
}
